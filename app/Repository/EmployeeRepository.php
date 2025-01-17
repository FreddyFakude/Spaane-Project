<?php

namespace App\Repository;

use App\Helper\Spaane;
use App\Models\Chat;
use App\Models\Company;
use App\Models\CompanyAccountAdministrator;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class EmployeeRepository
{
    public function quickCreate(Company $company,  array $data, $status = Employee::STATUS['guest'])
    {
        $email  = !isset($data['email']) ? "email-{$data['mobile_number']}@unregistered.com" : $data['email'];
        $firstName = !isset($data['first_name']) ? "Unregistered" : $data['first_name'];
        $name = isset($data['name']) ? $data['name'] : $firstName;
        $lastName  = !isset($data['last_name']) ? "Unregistered" : $data['last_name'];

       $employee =  Employee::create([
            "name" => $name,
            "first_name" => $firstName,
            "last_name" => $lastName,
            "email" => $email,
            "mobile_number" => $data['mobile_number'],
            "marital_status" => '',
            "password" => Hash::make(Spaane::EMPOLOYEE_DEFAULT_PASSWORD),
            "company_department_id" => 34,
            "company_id" => $company->id,
            "hash" => sha1($email . time() . rand(1, 100000)),
            "role" => !isset($data['position']) ? "employee" : $data['position'],
            "status" => $status,
       ]);
       $chat = (new ChatRepository())->findOrCreateChatWithEmployee($employee);
        return $employee;
    }
    public function updateOrcreate(Employee $employee, array $data)
    {

        return  $employee->update([
            "name"=>$data['first_name'],
            "first_name"=>$data['first_name'],
            "last_name"=>$data['last_name'],
            "dob"=>$data['dob'],
            "is_profile_complete" => 1,
            "nationality" =>$data['nationality'],
            "email"=> $data['work_email'],
            "personal_email"=> $data['personal_email'],
            "id_or_passport"=> $data['id_or_passport'],
            "gender" => $data['gender'],
            "marital_status"=>$data['marital_status'],
//            "mobile_number"=>$data['mobile_number'],
            "home_phone_number"=>$data['home_phone_number'],
            "number_of_children"=>$data['number_of_children'],
            "tax_number"=>$data['tax_number'],
            "driving_license_number"=>$data['driving_license_number'],
            "emergency_phone_number" => $data['emergency_phone_number'],
            "status"=>"COMPLETE",
            "direct_manager"=>$data['direct_manager'],
            "company_department_id" => $data['department_id'],
            "type" => $data['type'],
        ]);
    }
}
