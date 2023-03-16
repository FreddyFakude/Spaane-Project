<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\LeaveType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyLeavePolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [];
        foreach(Company::all() as $company)
        {
            foreach (LeaveType::all() as $leaveType)
            {
                $array[] = [
                    'company_id' => $company->id,
                    'leave_type_id' => $leaveType->id,
                    'leave_duration_days' => 20,
                    'leave_validity_days' => 365
                ];
            }
        }
        DB::table('company_leave_policies')->insert($array);
    }
}
