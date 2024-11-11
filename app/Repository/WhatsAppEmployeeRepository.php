<?php


namespace App\Repository;


use App\Models\Chat;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class WhatsAppEmployeeRepository
{

    /**
     *
     * Get employee object by their phone number
     *
     * @param int $phoneNumber
     * @return Employee
     */
    public function getEmployeeByPhoneNumber(int $phoneNumber)
    {
        return  Employee::firstWhere([
            'mobile_number' => $phoneNumber
        ]);
    }

}
