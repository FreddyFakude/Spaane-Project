<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeProfileRequest;
use App\Models\CompanyDepartment;
use App\Models\Employee;
use App\Models\Skill;
use App\Repository\EmployeeProfileRepository;
use App\Services\WhatsApp\WhatsAppChatManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{

    public function __construct( WhatsAppChatManager $chatManager)
    {
        $this->chatManager = $chatManager;
    }
    public function editProfile()
    {
        return view('dashboard.employee.edit-profile',[
                "employee" => Auth::user()->load(['address', 'professional_experience', 'education']),
                "skills" => Skill::all(),
                "selectedSkills" => Auth::user()->skills?->pluck('id')->toArray(),
                "departments" => Cache::get('departments', function () {
                    return CompanyDepartment::all();
                })
            ]
        );
    }

    public function updatePersonalDetails(EmployeeProfileRequest $request, EmployeeProfileRepository $employeeProfileRepository)
    {
        $validated = $request->validated();
        $validated["mobile_number"] = "27" . substr($validated["mobile_number"], 1); //remove zero and add prefix
        $employee = Auth::user();
        $employeeProfileRepository->updateOrInsertEmployee($employee, $validated);
        $employeeProfileRepository->updateOrInsertEmployeeAddress($employee, $validated);
        $this->chatManager->sendWhatsAppMessageToEmployee(Auth::user(), "Your profile has been updated");
        session()->flash('talent-profile-updated');
        return back();
    }

    public function updateBankingDetails(Request $request, $employee, EmployeeProfileRepository $employeeProfileRepository){
        $validated = $request->validate([
            "bank_name" => "required",
            "account_number" => "required",
            "branch_code" => "required",
            "account_type" => "nullable"
        ]);
        $employee = Auth::user();
        $employeeProfileRepository->updateOrInsertEmployeeBankAccount($employee, $validated);
        return back()->with('success', 'Profile updated');
    }

    public function updateEducationAndEmployment(Request $request, Employee $employee, EmployeeProfileRepository $employeeProfileRepository)
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

        $education = $employeeProfileRepository->updateOrInsertEmployeeEducation($employee, $validated);
        if ($validated['position'] && $validated['employment_start_date']) {
            $experience = $employeeProfileRepository->updateOrInsertEmployeeExperience($employee, $validated);
        }

        if ((isset($validated['skills'])) && count($validated['skills'])>0) {
            $skills = $employeeProfileRepository->updateOrInsertEmployeeSkills($employee, $validated);
        }
        return back()->with("success", "Profile updated");
    }
}
