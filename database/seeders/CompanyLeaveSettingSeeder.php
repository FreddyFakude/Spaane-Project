<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\CompanyLeaveType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyLeaveSettingSeeder extends Seeder
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
            foreach (CompanyLeaveType::all() as $leaveType)
            {
                $array[] = [
                    'company_id' => $company->id,
                    'company_leave_type_id' => $leaveType->id,
                    'leave_duration_days' => 20,
                    'leave_validity_days' => 365
                ];
            }
        }
        DB::table('company_leave_settings')->insert($array);
    }
}
