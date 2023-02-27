<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeLeave;
use App\Models\EmployeeLeaveDay;
use App\Repository\WhatsAppTemplateMessageRepository;
use App\WhatsApp\WhatsAppChatManager;
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

        $leave = EmployeeLeave::create([
            "employee_id" => $employee->id,
            "requested_date" => $validated['leave_date'],
            "employee_leave_day_id" => $employee->leaveDays->last()->id,
            "status"=> EmployeeLeave::STATUS['approved'],
            "hash" => sha1(time())
        ]);

        $message = $this->appTemplateMessageRepository->getMessageBySlug('employee.update.message');
        $this->chatManager->sendWhatsAppMessageToEmployee($employee, sprintf($message->content, $employee->first_name, Auth::user()->company->name));

        session()->flash('talent-updated');
        return back();

    }

    public function approveLeave(Employee $employee, $hash)
    {
        $leave = EmployeeLeave::where('hash', $hash)->firstOrFail();
        $leave->status = EmployeeLeave::STATUS['approved'];
        $leave->save();

        $message = $this->appTemplateMessageRepository->getMessageBySlug('employee.update.message');
        $this->chatManager->sendWhatsAppMessageToEmployee($employee, sprintf($message->content, $employee->first_name, Auth::user()->company->name));

        session()->flash('leave-approved');
        return back();

    }
}
