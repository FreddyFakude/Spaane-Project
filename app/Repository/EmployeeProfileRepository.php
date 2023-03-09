<?php

namespace App\Repository;

use App\Models\Address;
use App\Models\BankAccount;
use App\Models\Education;
use App\Models\Employee;
use App\Models\EmployeeRemuneration;
use App\Models\ProfessionalExperience;

class EmployeeProfileRepository
{


    public function __construct(Employee $employee, array $data)
    {
        $this->updateOrInsertEmployeeProfile($employee, $data);
        $this->updateOrInsertEmployeeAddress($employee, $data);
        $this->updateOrInsertEmployeeEducation($employee, $data);
        $this->updateOrInsertEmployeeSkills($employee, $data);
        $this->updateOrInsertEmployeeExperience($employee, $data);
        $this->updateOrInsertEmployeeBankAccount($employee, $data);
        $this->updateOrInsertEmployeeSalary($employee, $data);
    }

    private function updateOrInsertEmployeeProfile(Employee $employee, array $data)
    {

      return  $employee->update([
            "name"=>$data['first_name'],
            "first_name"=>$data['first_name'],
            "last_name"=>$data['last_name'],
            "dob"=>$data['dob'],
            "is_profile_complete" => 1,
            "nationality" =>$data['nationality'],
            "email"=> $data['personal_email'],
            "personal_email"=> $data['personal_email'],
            "id_or_passport"=> $data['id_or_passport'],
            "gender" => $data['gender'],
            "marital_status"=>$data['marital_status'],
            "mobile_number"=>$data['mobile_number'],
            "home_phone_number"=>$data['home_phone_number'],
            "number_of_children"=>$data['number_of_children'],
            "tax_number"=>$data['tax_number'],
            "driving_license_number"=>$data['driving_license_number'],
            "emergency_phone_number" => $data['emergency_phone_number'],
            "status"=>"COMPLETE",
        ]);
    }

    private function updateOrInsertEmployeeAddress(Employee $employee, array $data): void
    {
        $addressPayload = [
            "street_number" => $data['street_number'],
            "street_name" => $data['street_name'],
            "suburb" => $data['suburb'],
            "city" => $data['city'],
            "state" => $data['state'],
            "zip_code" => $data['zip_code'],
            "country" => "South Africa",
            "addressable_id" => $employee->id,
            "addressable_type" => Employee::class
        ];

        $employee->address ? $employee->address->update($addressPayload) : Address::create($addressPayload);
    }

    private function updateOrInsertEmployeeEducation(Employee $employee, array $data): void
    {
        $educationPayload = [
            "qualification" => $data['qualification'],
            "qualification_end_date" => $data['qualification_end_date'],
            "educationable_type"=> Employee::class,
            "educationable_id" => $employee->id
        ];
        $employee->education ? $employee->education->update($educationPayload) : Education::create($educationPayload);

    }

    private function updateOrInsertEmployeeExperience(Employee $employee, array $data): void
    {
        $experiencePayload = [
            'professional_experienceable_type' => Employee::class,
            'professional_experienceable_id'=> $employee->id,
            'start_date'=> $data['employment_start_date'],
            'role'=>$data['position'],
            'organisation_name' => $data['organisation_name'],
            'is_current'=> true
        ];

        $employee->experience? $employee->experience->update($experiencePayload) : ProfessionalExperience::create($experiencePayload);
    }

    private function updateOrInsertEmployeeSkills(Employee $employee, array $data): void
    {
        $skill = $employee->skills()->sync($data['skills']);
    }

    private function updateOrInsertEmployeeBankAccount(Employee $employee, array $data)
    {
        $bankAccountPayload = [
            "bank_name" => $data['bank_name'],
            "account_number" => $data['account_number'],
            "branch_code" => $data['branch_code'],
            "account_type" => $data['account_type'],
            "bank_accountable_type" => Employee::class,
            "bank_accountable_id" => $employee->id
        ];

        $employee->bankAccount ? $employee->bankAccount->update($bankAccountPayload) : BankAccount::create($bankAccountPayload);
    }

    private function updateOrInsertEmployeeSalary(Employee $employee, array $data)
    {
        if (!isset($data['basic_salary']) || !isset($data["travel_allowance"])){
            return;
        }

        $salaryPayload = [
            "basic_salary" => $data['basic_salary'],
            "travel_allowance" => $data['travel_allowance'],
            "employee_id" => $employee->id
        ];

        $employee->salary ? $employee->salary->update($salaryPayload) : EmployeeRemuneration::create($salaryPayload);
    }
}
