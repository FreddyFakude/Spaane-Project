<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "first_name"=>"required",
            "last_name"=>"required",
            "dob"=>"required|date",
            "nationality" => "required",
            "id_or_passport" => "required",
            "gender"=>["required",  Rule::in(['Male', 'Female'])],
            "marital_status" => ["required",  Rule::in(['Single', 'Married', 'Divorced'])],
            "mobile_number"=>"required|numeric|starts_with:0|digits:10",
            "emergency_phone_number"=>"required",
            "home_phone_number"=> "nullable|numeric|starts_with:0|digits:10",
            "number_of_children"=>"required",
            "personal_email"=>"required|email",
            "street_number"=>"required",
            "street_name"=>"required",
            "suburb"=>"required",
            "city"=>"required",
            "state"=>"required",
            "employment_start_date"=>"required|date",
            "position"=>"required",
            "organisation_name"=> "required",
            "driving_license_number"=>"nullable",
            "office_phone_number"=>"nullable",
            "tax_number"=>"required",
            "skills.*"=>"required|integer",
            "qualification_end_date"=>"required|date",
            "qualification"=>"required",
            "special_note"=>"nullable",
            "zip_code"=>"required"
        ];

    }
}
