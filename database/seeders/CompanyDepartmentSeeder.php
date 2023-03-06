<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("company_departments")->insert([
            ["name"=>"Accounting & finance"],
            ["name"=>"Marketing & Sales"],
            ["name"=>"Human resource"],
            ["name"=>"Production"],
            ["name"=>"Software development"],
            ["name"=>"Customer support"],
            ["name"=>"Distribution & deliveries"],
            ["name"=>"Research & development"],
            ["name"=>"Engineering"],
            ["name"=>"Growth"],
            ["name"=>"Legal"],
            ["name"=>"General"],
            ["name"=>"Administration"],
            ["name"=>"Information & technology"],
            ["name"=>"Security"],
            ["name"=>"Operations"],
            ["name"=>"Unspecified"] //ID 16
    ]);
    }
}
