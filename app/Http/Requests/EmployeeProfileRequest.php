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
            "nationality" => "nullable",
            "id_or_passport" => "nullable",
            "gender"=>["required",  Rule::in(['Male', 'Female'])],
            "marital_status" => ["required",  Rule::in(['Single', 'Married', 'Divorced'])],
            "mobile_number"=>"required|numeric|starts_with:0|digits:10",
            "emergency_phone_number"=>"nullable|numeric|starts_with:0|digits:10",
            "home_phone_number"=> "nullable|numeric|starts_with:0|digits:10",
            "number_of_children"=>"nullable|numeric",
            "personal_email"=>"required|email",
            "street_number"=>"nullable",
            "street_name"=>"nullable",
            "suburb"=>"nullable",
            "city"=>"nullable",
            "state"=>"required",
            "employment_start_date"=>"nullable|date",
            "position"=>"required",
            "organisation_name"=> "nullable",
            "driving_license_number"=>"nullable",
            "office_phone_number"=>"nullable",
            "tax_number"=>"nullable",
            "skills.*"=>"nullable|integer",
            "qualification_end_date"=>"nullable|date",
            "qualification"=>"nullable",
            "special_note"=>"nullable",
            "direct_manager"=>"nullable",
            "zip_code"=>"nullable",
            "department_id"=>"nullable|integer",
            "type"=> ["required",  Rule::in(\App\Models\Employee::ContractType)],
            "bank_name" => "required",
            "account_number" => "required",
            "branch_code" => "required",
            "account_type" => "nullable",
            "basic_salary" => "nullable|numeric",
            "travel_allowance" => "nullable|numeric",
        ];

    }
}
