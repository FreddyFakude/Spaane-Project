<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Mail\EmployeeInvite;
use App\Models\Employee;
use App\Models\EmployeeLeave;
use App\Models\EmployeeLeaveDay;
use App\Repository\WhatsAppTemplateMessageRepository;
use App\WhatsApp\WhatsAppChatManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{


    /**
     * EmployeeController constructor.
     */
    public function __construct( WhatsAppChatManager $chatManager)
    {
        $this->chatManager = $chatManager;
        $this->appTemplateMessageRepository = new WhatsAppTemplateMessageRepository();
    }

    public function list()
    {

        return view(
            'dashboard.company.employee-list',
            [
                'employees' => Auth::user()->employees
            ]);
    }

    public function viewTalent(Employee $employee){
        return view('dashboard.company.internal_talent', [
            'employee' => $employee
        ]);
    }

    public function inviteEmployee(Request $request)
    {
        $validated = $request->validate([
            "first_name"=>"required",
            "last_name"=>"required",
            "email"=>"required|email",
            "position" => "required",
            "mobile_number" => "required|numeric|starts_with:0|digits:10|unique:employees,mobile_number"
        ]);

        $validated["mobile_number"] = "27" . substr($validated["mobile_number"], 1); //remove zero and add prefix
        $businessAdmin = Auth::guard('company')->user();
//        $employee = Employee::create([
//            "department_id" => 16,
//            "business_id" => $businessAdmin->business_id
//        ]);

        $employee = Employee::create([
            "name" => $validated['first_name'],
            "first_name" => $validated['first_name'],
            "last_name" => $validated['last_name'],
            "email" => $validated['email'],
            "mobile_number" => $validated['mobile_number'],
            "marital_status" => '',
            "password" => Hash::make('password'),
            "company_department_id" => 16,
            "company_id" => $businessAdmin->company_id,
//            "talent_profileable_id" => $employee->id,
            "role" => $validated['position']
        ]);

        $leaveDays =  EmployeeLeaveDay::create([
            "employee_id"=> $employee->id
        ]);

        $email = Mail::to($validated['email'])->queue(new EmployeeInvite($validated['first_name'], $businessAdmin));

        $message = $this->appTemplateMessageRepository->getMessageBySlug('employee.new-profile.added');
        $this->chatManager->sendWhatsAppMessageToEmployee($employee, sprintf($message->content, Auth::user()->company->name));


        session()->flash('talent-added');
        return back();
    }

    public function updateEmployeeLeaveDay(Request $request,Employee $employee)
    {
        $validated = $request->validate([
            "leave_days"=>"required|integer|lt:" . $employee->current_leave_days
        ]);

        $leave = EmployeeLeave::create([
            "employee_id" => $employee->id,
            "requested_days" => $validated['leave_days'],
            "employee_leave_day_id" => $employee->leaveDays->last()->id,
            "status"=> EmployeeLeave::STATUS['approved']
        ]);

        $message = $this->appTemplateMessageRepository->getMessageBySlug('employee.update.message');
        $this->chatManager->sendWhatsAppMessageToEmployee($employee, sprintf($message->content, $employee->first_name, Auth::user()->company->name));

        session()->flash('talent-updated');
        return back();

    }
}
