<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeRemunerationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_remunerations')
            ->insert([
                [
                    'employee_id' => 1,
                    'company_remuneration_id' => 1,
                    'amount' => 10000,
                    'name' => 'Basic Salary',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'employee_id' => 1,
                    'company_remuneration_id' => 2,
                    'name' => 'Housing Allowance',
                    'amount' => 5000,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
    }
}
