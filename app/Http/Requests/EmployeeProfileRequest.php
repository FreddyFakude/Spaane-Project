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
            "dob"=>"nullable|date",
            "nationality" => "nullable",
            "id_or_passport" => "nullable",
            "gender"=>["nullable",  Rule::in(['Male', 'Female'])],
            "marital_status" => ["nullable",  Rule::in(['Single', 'Married', 'Divorced'])],
            "mobile_number"=>"required|numeric|starts_with:0|digits:10",
            "emergency_phone_number"=>"nullable|numeric|starts_with:0|digits:10",
            "home_phone_number"=> "nullable|numeric|starts_with:0|digits:10",
            "number_of_children"=>"nullable|numeric",
            "personal_email"=>"nullable|email",
            "work_email"=>"required|email",
            "direct_manager"=> "nullable|string",
            "type"=> ["required",  Rule::in(\App\Models\Employee::ContractType)],
            "street_number"=>"nullable",
            "street_name"=>"nullable",
            "suburb"=>"nullable",
            "city"=>"required|nullable",
            "state"=>"required",

            "driving_license_number"=>"nullable",
            "office_phone_number"=>"nullable",
            "tax_number"=>"nullable",

            "special_note"=>"nullable",

            "zip_code"=>"nullable",
            "department_id"=>"required|integer",
        ];

    }
}
