<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\CompanyLeavePolicy;
use App\Models\Employee;
use App\Models\EmployeeLeaveRequest;
use App\Repository\EmployeeLeaveRequestRepository;
use App\Repository\WhatsAppTemplateMessageRepository;
use App\Services\LeaveCalculation;
use App\Services\WhatsApp\WhatsAppChatManager;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class EmployeeLeaveController extends Controller
{
    private WhatsAppChatManager $chatManager;
    private WhatsAppTemplateMessageRepository $appTemplateMessageRepository;


    /**
     * EmployeeLeaveController constructor.
     */
    public function __construct( WhatsAppChatManager $chatManager, EmployeeLeaveRequestRepository $employeeLeaveRequestRepository)
    {
        $this->chatManager = $chatManager;
        $this->appTemplateMessageRepository = new WhatsAppTemplateMessageRepository();
        $this->employeeLeaveRequestRepository = $employeeLeaveRequestRepository;
    }

//    public function updateEmployeeLeaveDay(Request $request, Employee $employee)
//    {
//        $validated = $request->validate([
//            "leave_date"=>"required|date"
////            "leave_days"=>"required|integer|lt:" . $employee->current_leave_days
//        ]);
//
//        $currentLeaveDays = $employee->currentLeaveDays;
//        if ($currentLeaveDays == 0){
//            return back()->withErrors(['leave_date' => 'You have reached the maximum leave days']);
//        }
//
//        $leave = EmployeeLeaveRequest::create([
//            "employee_id" => $employee->id,
//            "requested_date" => $validated['leave_date'],
//            "employee_leave_day_id" => $employee->initialLeaveTypeDays->last()->id,
//            "status"=> EmployeeLeaveRequest::STATUS['approved'],
//            "hash" => sha1(time())
//        ]);
//
//        $message = $this->appTemplateMessageRepository->getMessageBySlug('employee.update.message');
//        $this->chatManager->sendWhatsAppMessageToEmployee($employee, sprintf($message->content, $employee->first_name, Auth::user()->company->name));
//
//        session()->flash('talent-updated');
//        return back();
//
//    }

    public function index(){
        $employees = Auth::user()->employees;
        $employees->load(['leavePolicies', 'leaveRequests']);
        return view('dashboard.company.index', [
            "employees"=>$employees,
            "businessId" =>  Auth::id(),
            "companyLeavePolicy" => Cache::get('companyLeaveTypes', function () {
                return CompanyLeavePolicy::with('leaveType')->get();
            })
        ]);
    }
    public function approveLeave(Employee $employee, EmployeeLeaveRequest $leaveRequest)
    {

        if ($leaveRequest->total_days < (new LeaveCalculation())->calculateRemainingDaysOnLeaveType($employee, $leaveRequest->initialDay)){
            $leaveRequest->status = EmployeeLeaveRequest::STATUS['approved'];
            $leaveRequest->save();
            $message = $this->appTemplateMessageRepository->getMessageBySlug('employee.update.message');
            $this->chatManager->sendWhatsAppMessageToEmployee($employee, sprintf($message->content, $employee->first_name, Auth::user()->company->name));

            session()->flash('leave-approved');
            return back();
        }

        return back()->withErrors(['leave_date' => 'You have reached the maximum leave days']);

    }

    public function leaveManualRequest(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            "start_date"=>"required|date",
            "end_date"=>"required|date|after:start_date",
            "employee_leave_policy_id"=>"required|exists:employee_leave_policies,id",
        ]);

        $employeeLeavePolicy = $employee->leavePolicies->find($validated['employee_leave_policy_id']);
        $this->employeeLeaveRequestRepository->insert($employee, $employeeLeavePolicy->initialDay, $employeeLeavePolicy, $validated['start_date'], $validated['end_date']);
        return back()->with('success', 'Leave request sent successfully');
    }
}
