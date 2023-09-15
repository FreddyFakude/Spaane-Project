<?php

namespace App\Http\Controllers\Company;

use App\Helper\Spaane;
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


    private $employeeRepository;
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
            "mobile_number" => "required|numeric|starts_with:0|digits:10"
        ]);

        $validated["mobile_number"] = "27" . substr($validated["mobile_number"], 1); //remove zero and add prefix

        if (Employee::where('mobile_number', '=', $validated['mobile_number'])->exists()) {
            return back()->withErrors(['email' => 'Employee with this number already exists']);
        }
        $company = Auth::guard('company')->user()->company;
        $employee = (new EmployeeRepository())->quickCreate($company, $validated, Employee::STATUS['invite_sent']);
        $remunerations = (new EmployeeRemunerationAndDeductionService())->processNewEmployee($company, $employee);
        $email = Mail::to($validated['email'])->queue(new EmployeeInvite($validated['first_name'], Auth::guard('company')->user()));
        $message = $this->appTemplateMessageRepository->getMessageBySlug('employee.new-profile.added');
        $this->chatManager->sendWhatsAppMessageToEmployee($employee, sprintf($message->content, Auth::user()->company->name, $employee->email, Spaane::EMPOLOYEE_DEFAULT_PASSWORD, route('employee.login.form')));


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
            "employment_start_date"=>"nullable|required_unless:position,null|date",
            "position"=>"required_unless:employment_start_date,null",
            "organisation_name"=> "nullable",
            "skills.*"=>"required|integer",
            "qualification_end_date"=>"required|date",
            "qualification"=>"required",
            "type"=> ["nullable","required_unless:position,null", Rule::in(\App\Models\Employee::ContractType)],
        ]);

        $education = $this->employeeRepository->updateOrInsertEmployeeEducation($employee, $validated);
        if ($validated['position'] && $validated['employment_start_date']) {
            $experience = $this->employeeRepository->updateOrInsertEmployeeExperience($employee, $validated);
        }

        if ((isset($validated['skills'])) && count($validated['skills'])>0) {
            $skills = $this->employeeRepository->updateOrInsertEmployeeSkills($employee, $validated);
        }
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

    public function deleteEmployee(Employee $employee)
    {
        $employee->delete();
        return back()->with('success', 'Employee deleted');
    }
}
