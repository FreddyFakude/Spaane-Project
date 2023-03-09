<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeProfileRequest;
use App\Models\Address;
use App\Models\CompanyDepartment;
use App\Models\Education;
use App\Models\ProfessionalExperience;
use App\Models\Skill;
use App\Repository\EmployeeProfileRepository;
use App\WhatsApp\WhatsAppChatManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ProfileController extends Controller
{

    public function __construct( WhatsAppChatManager $chatManager)
    {
        $this->chatManager = $chatManager;
    }
    public function editProfile()
    {
        return view('dashboard.employee.edit-profile',[
                "talent" => Auth::user()->load(['address', 'professional_experience', 'education']),
                "skills" => Skill::all(),
                "selectedSkills" => Auth::user()->skills?->pluck('id')->toArray(),
                "departments" => Cache::get('departments', function () {
                    return CompanyDepartment::all();
                })
            ]
        );
    }

    public function saveProfile(EmployeeProfileRequest $request)
    {
        $validated = $request->validated();
        $validated["mobile_number"] = "27" . substr($validated["mobile_number"], 1); //remove zero and add prefix
        $employee = Auth::user();
        $profile = new EmployeeProfileRepository($employee, $validated);
        $this->chatManager->sendWhatsAppMessageToEmployee(Auth::user(), "Your profile has been updated");
        session()->flash('talent-profile-updated');
        return back();
    }

}
