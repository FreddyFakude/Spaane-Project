<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeProfileRequest;
use App\Mail\EmployeeInvite;
use App\Models\Education;
use App\Models\Employee;
use App\Models\EmployeeLeaveInitialCurrentDay;
use App\Repository\EmployeeProfileRepository;
use App\Repository\EmployeeRepository;
use App\Repository\WhatsAppTemplateMessageRepository;
use App\Services\EmployeeRemunerationAndDeductionService;
use App\Services\WhatsApp\WhatsAppChatManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{


    /**
     * EmployeeController constructor.
     */
    public function __construct( WhatsAppChatManager $chatManager)
    {
        $this->chatManager = $chatManager;
        $this->appTemplateMessageRepository = new WhatsAppTemplateMessageRepository();
        $this->employeeRepository = new EmployeeProfileRepository();
    }

    public function list()
    {

        return view(
            'dashboard.company.employee-list',
            [
                'employees' => Auth::user()->company->employees
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
        $company = Auth::guard('company')->user()->company;
        $employee = (new EmployeeRepository())->quickCreate($company, $validated, Employee::STATUS['invite_sent']);
        $remunerations = (new EmployeeRemunerationAndDeductionService())->processNewEmployee($company, $employee);
        $email = Mail::to($validated['email'])->queue(new EmployeeInvite($validated['first_name'], Auth::guard('company')->user()));
        $message = $this->appTemplateMessageRepository->getMessageBySlug('employee.new-profile.added');
        $this->chatManager->sendWhatsAppMessageToEmployee($employee, sprintf($message->content, Auth::user()->company->name));


        session()->flash('talent-added');
        return back();
    }

    public function updateEmployeePersonalDetails(EmployeeProfileRequest $request, Employee $employee)
    {
        $validated = $request->validated();
        $validated["mobile_number"] = "27" . substr($validated["mobile_number"], 1); //remove zero and add prefix
        $profile = $this->employeeRepository->updateOrInsertEmployee($employee, $validated);
        $address =$this->employeeRepository->updateOrInsertEmployeeAddress($employee, $validated);

        return back()->with('success', 'Profile updated');
    }

    public function updateEducationAndEmployment(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            "employment_start_date"=>"nullable|date",
            "position"=>"required",
            "organisation_name"=> "nullable",
            "skills.*"=>"required|integer",
            "qualification_end_date"=>"required|date",
            "qualification"=>"required",
            "type"=> ["required",  Rule::in(\App\Models\Employee::ContractType)],
        ]);

        $education = $this->employeeRepository->updateOrInsertEmployeeEducation($employee, $validated);
        $experience = $this->employeeRepository->updateOrInsertEmployeeExperience($employee, $validated);
        $skills = $this->employeeRepository->updateOrInsertEmployeeSkills($employee, $validated);

        return back()->with("success", "Profile updated");
    }

    public function updateOtherEmployeeInformation(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            "bank_name" => "required",
            "account_number" => "required",
            "branch_code" => "required",
            "account_type" => "nullable"
        ]);

        $banking = $this->employeeRepository->updateOrInsertEmployeeBankAccount($employee, $validated);
        return back()->with('success', 'Profile updated');
    }
}
