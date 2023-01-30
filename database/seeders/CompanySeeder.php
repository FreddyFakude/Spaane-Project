<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
                'name' => "Teambix Support Company",
                'phone_number' => '27788129192',
                'date_creation' => '2022-01-01',
                'funding' => "Self funded",
                'short_description' => 'This is my amazing company'
            ],
            [
                'name' => "King Show Business 2",
                'phone_number' => '27788129192',
                'date_creation' => '2022-01-01',
                'funding' => "Self funded",
                'short_description' => 'This is my second amazing company '
            ]
        ]);
    }
}
