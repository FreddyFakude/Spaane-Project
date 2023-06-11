<?php

namespace Database\Seeders;

use App\Models\Company;
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
                'id' => 1,
                'name' => "Teambix Support Company",
                'head_office_name' => "Teambix Support Company",
                'phone_number' => '27788129192',
                'date_creation' => '2022-01-01',
                'status'=> Company::STATUS[2],
                'fiscal_year_start' => '2022-01-01',
                'funding' => "Self funded",
                'short_description' => 'This is my amazing company'
            ],
            [
                'id' => 2,
                'head_office_name' => "King Show Business 2",
                'name' => "King Show Business 2",
                'phone_number' => '27788129192',
                'date_creation' => '2022-01-01',
                'status'=> Company::STATUS[2],
                'fiscal_year_start' => '2022-01-01',
                'funding' => "Self funded",
                'short_description' => 'This is my second amazing company '
            ]
        ]);
    }
}
