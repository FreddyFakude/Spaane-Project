<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyRemunerationListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company_remuneration_lists')
            ->insert([
                [
                    'company_id' => 1,
                    'remuneration_list_id' => 1,
                    'name' => 'Basic Salary',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'company_id' => 1,
                    'remuneration_list_id' => 4,
                    'name' => 'Housing Allowance',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
    }
}
