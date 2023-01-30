<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeProfileRequest;
use App\Models\Address;
use App\Models\Education;
use App\Models\ProfessionalExperience;
use App\Models\Skill;
use App\WhatsApp\WhatsAppChatManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                "selectedSkills" => Auth::user()->skills?->pluck('id')->toArray()
            ]
        );
    }

    public function saveProfile(EmployeeProfileRequest $request)
    {
        $validated = $request->validated();
//       dd($request->all());
        $talent = Auth::user()->update([
            "first_name"=>$validated['first_name'],
            "last_name"=>$validated['last_name'],
            "dob"=>$validated['dob'],
            "is_profile_complete" => 1,
            "nationality" =>$validated['nationality'],
            "email"=> $validated['personal_email'],
            "personal_email"=> $validated['personal_email'],
            "gender" => $validated['gender'],
            "marital_status"=>$validated['marital_status'],
            "mobile_number"=>$validated['mobile_number'],
            "home_phone_number"=>$validated['home_phone_number'],
            "number_of_children"=>$validated['number_of_children'],
            "tax_number"=>$validated['tax_number'],
            "driving_license_number"=>$validated['driving_license_number'],
            "emergency_phone_number" => $validated['emergency_phone_number'],
            "status"=>"COMPLETE"
        ]);

        $addressPayload = [
            "addressable_type"=>"App\Models\Employee",
            "addressable_id"=> Auth::id(),
            "street_name"=> $validated['street_name'],
            "street_number"=>12,
            "suburb"=>$validated['suburb'],
            "city" => $validated['city'],
            "state"=> $validated['state'],
            "zip_code"=> $validated['zip_code'],
            "country"=> "South Africa"
        ];

        $educationPayload = [
            "educationable_type"=>"App\Models\Employee",
            "educationable_id" => Auth::id(),
            "qualification" => $validated['qualification'],
            "qualification_end_date"=> $validated['qualification_end_date']
        ];

        $experiencePayload = [
            'professional_experienceable_type' =>'App\Models\Employee',
            'professional_experienceable_id'=> Auth::id(),
            'start_date'=> $validated['employment_start_date'],
            'role'=>$validated['position'],
            'organisation_name' => $validated['organisation_name'],
            'is_current'=> true
        ];

        $skill = Auth::user()->skills()->sync($validated['skills']);
//        $address = Address::updateOrCreate(['addressable_type'=>'App\Models\TalentProfile','addressable_id' => Auth::id()], $addressPayload);
        Auth::user()->address ? Auth::user()->address->update($addressPayload) : Address::create($addressPayload);
        Auth::user()->education ? Auth::user()->education->update($educationPayload) : Education::create($educationPayload);
        Auth::user()->professional_experience ? Auth::user()->professional_experience->update($experiencePayload) : ProfessionalExperience::create($experiencePayload);

        $this->chatManager->sendWhatsAppMessageToEmployee(Auth::user(), "Your profile has been updated");
        session()->flash('talent-profile-updated');
        return back();
    }

}
