<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeProfileRequest;
use App\Mail\EmployeeInvite;
use App\Models\Employee;
use App\Models\EmployeeLeaveInitialCurrentDay;
use App\Repository\EmployeeProfileRepository;
use App\Repository\EmployeeRepository;
use App\Repository\WhatsAppTemplateMessageRepository;
use App\Services\WhatsApp\WhatsAppChatManager;
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
        $company = Auth::guard('company')->user()->company;
        $employee = (new EmployeeRepository())->quickCreate($company, $validated);
        $email = Mail::to($validated['email'])->queue(new EmployeeInvite($validated['first_name'], Auth::guard('company')->user()));
        $message = $this->appTemplateMessageRepository->getMessageBySlug('employee.new-profile.added');
        $this->chatManager->sendWhatsAppMessageToEmployee($employee, sprintf($message->content, Auth::user()->company->name));


        session()->flash('talent-added');
        return back();
    }

    public function updateEmployeeProfile(EmployeeProfileRequest $request, Employee $employee)
    {
        $validated = $request->validated();
        $validated["mobile_number"] = "27" . substr($validated["mobile_number"], 1); //remove zero and add prefix
        $profile = new EmployeeProfileRepository($employee, $validated);
        $this->chatManager->sendWhatsAppMessageToEmployee($employee, "Your profile has been updated");
        session()->flash('talent-profile-updated');
        return back();
    }
}
