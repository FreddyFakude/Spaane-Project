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




    public function updateOrInsertEmployee(Employee $employee, array $data)
    {
        return (new EmployeeRepository())->updateOrcreate($employee, $data);
    }

    public function updateOrInsertEmployeeAddress(Employee $employee, array $data)
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

      return $employee->address ? $employee->address->update($addressPayload) : (new AddressRepository())->insert($data, $employee->id, Employee::class);
    }

    public function updateOrInsertEmployeeEducation(Employee $employee, array $data)
    {
        $educationPayload = [
            "qualification" => $data['qualification'],
            "qualification_end_date" => $data['qualification_end_date'],
            "educationable_type"=> Employee::class,
            "educationable_id" => $employee->id
        ];
      return  $employee->education ? $employee->education->update($educationPayload) : Education::create($educationPayload);
    }

    public function updateOrInsertEmployeeExperience(Employee $employee, array $data)
    {
        $experiencePayload = [
            'professional_experienceable_type' => Employee::class,
            'professional_experienceable_id'=> $employee->id,
            'start_date'=> $data['employment_start_date'],
            'role'=>$data['position'],
            'organisation_name' => $data['organisation_name'],
            'is_current'=> true
        ];

      return  $employee->experience? $employee->experience->update($experiencePayload) : ProfessionalExperience::create($experiencePayload);
    }

    public function updateOrInsertEmployeeSkills(Employee $employee, array $data)
    {
        return $employee->skills()->sync($data['skills']);
    }

    public  function updateOrInsertEmployeeBankAccount(Employee $employee, array $data)
    {
        $bankAccountPayload = [
            "bank_name" => $data['bank_name'],
            "account_number" => $data['account_number'],
            "branch_code" => $data['branch_code'],
            "account_type" => $data['account_type'],
            "bank_accountable_type" => Employee::class,
            "bank_accountable_id" => $employee->id
        ];

       return $employee->bankAccount ? $employee->bankAccount->update($bankAccountPayload) : BankAccount::create($bankAccountPayload);
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
