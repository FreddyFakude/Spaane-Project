<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeLeaveRequest;
use App\Repository\WhatsAppTemplateMessageRepository;
use App\Services\WhatsApp\WhatsAppChatManager;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeLeaveController extends Controller
{
    private WhatsAppChatManager $chatManager;
    private WhatsAppTemplateMessageRepository $appTemplateMessageRepository;


    /**
     * EmployeeLeaveController constructor.
     */
    public function __construct( WhatsAppChatManager $chatManager)
    {
        $this->chatManager = $chatManager;
        $this->appTemplateMessageRepository = new WhatsAppTemplateMessageRepository();
    }

    public function updateEmployeeLeaveDay(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            "leave_date"=>"required|date"
//            "leave_days"=>"required|integer|lt:" . $employee->current_leave_days
        ]);

        $currentLeaveDays = $employee->currentLeaveDays;
        if ($currentLeaveDays == 0){
            return back()->withErrors(['leave_date' => 'You have reached the maximum leave days']);
        }

        $leave = EmployeeLeaveRequest::create([
            "employee_id" => $employee->id,
            "requested_date" => $validated['leave_date'],
            "employee_leave_day_id" => $employee->initialLeaveTypeDays->last()->id,
            "status"=> EmployeeLeaveRequest::STATUS['approved'],
            "hash" => sha1(time())
        ]);

        $message = $this->appTemplateMessageRepository->getMessageBySlug('employee.update.message');
        $this->chatManager->sendWhatsAppMessageToEmployee($employee, sprintf($message->content, $employee->first_name, Auth::user()->company->name));

        session()->flash('talent-updated');
        return back();

    }

    public function approveLeave(Employee $employee, $hash)
    {
        $leave = EmployeeLeaveRequest::where('hash', $hash)->firstOrFail();
        $leave->status = EmployeeLeaveRequest::STATUS['approved'];
        $leave->save();

        $message = $this->appTemplateMessageRepository->getMessageBySlug('employee.update.message');
        $this->chatManager->sendWhatsAppMessageToEmployee($employee, sprintf($message->content, $employee->first_name, Auth::user()->company->name));

        session()->flash('leave-approved');
        return back();

    }

    public function leaveManualRequest(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            "start_date"=>"required|date",
            "end_date"=>"required|date|after:start_date",
            "employee_leave_policy_id"=>"required|exists:employee_leave_policies,id",
        ]);

        $leave = EmployeeLeaveRequest::create([
            "employee_id" => $employee->id,
            "start_date" => $validated['start_date'],
            "end_date" => $validated['end_date'],
            'leave_initial_day_id' => $employee->initialLeaveTypeDays->last()->id,
            "employee_leave_policy_id" => $validated['employee_leave_policy_id'],
            "status"=> EmployeeLeaveRequest::STATUS['review'],
            "leave_type" => "Test",
            "total_days" => Carbon::parse($validated['start_date'])->diffInDays(Carbon::parse($validated['end_date'])),
            "hash" => sha1(time())
        ]);

        return back()->with('success', 'Leave request sent successfully');
    }
}
