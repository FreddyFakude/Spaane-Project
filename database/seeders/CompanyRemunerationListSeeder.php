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
        DB::table('company_remunerations')
            ->insert([
                [
                    'company_id' => 1,
                    'name' => 'Basic Salary',
                    'can_be_edited' => false,
                    'hash' => sha1(time()),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'company_id' => 1,
                    'name' => 'Housing Allowance',
                    'can_be_edited' => false,
                    'hash' => sha1(time()),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
    }
}
