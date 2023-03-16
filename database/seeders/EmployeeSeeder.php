<?php

namespace Database\Seeders;

use App\Models\CompanyLeaveSetting;
use App\Models\CompanyLeaveType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            [
                "id" => 1,
                "name" => "Jerry",
                "first_name" => "Jay",
                "last_name" => "Boy",
                "email" => "djerryboy2@gmail.com",
                "mobile_number" => "27788129192",
                "marital_status" => 'Single',
                "password" => Hash::make('password'),
                "company_department_id" => 16,
                "company_id" => 1,
                "hash" => sha1('djerryboy2@gmail.com'),
                "role" => "CEO"
            ]
        ]);

        $array = [];
        foreach (CompanyLeaveSetting::all() as $leaveSetting)
        {
            $array[] = [
                "employee_id"=> 1,
                "company_id" => $leaveSetting->company_id,
                "days" => $leaveSetting->leave_duration_days,
                "expiry_date" => Carbon::now()->addDays($leaveSetting->leave_validity_days)->format('Y-m-d'),
                "leave_type" => $leaveSetting->leaveType->name
            ];
        }

        DB::table('employee_leave_type_initial_days')->insert($array);
    }
}
