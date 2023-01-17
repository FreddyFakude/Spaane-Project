<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CompanyAccountAdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company_account_administrators')->insert([
            [
                'company_id' => 1,
                'email' => 'business-account-admin@website.com',
                'password' => Hash::make('password'),
                'role_id' => 1,
                'first_name' => 'Jeerba',
                'last_name' => 'boy',
                'dob' => '1992-08-12'
            ]
        ]);
    }
}
