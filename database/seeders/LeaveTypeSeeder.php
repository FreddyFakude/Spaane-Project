<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('leave_types')->insert([
            [
                "name"=> "Annual Leave",
            ],
            [
                "name"=> "Sick Leave",
            ],
            [
                "name"=> "Maternity Leave",
            ],
            [
                "name"=> "Paternity Leave",
            ],
            [
                "name"=> "Compassionate Leave",
            ],
            [
                "name"=> "Study Leave",
            ],
            [
                "name"=> "Unpaid Leave",
            ],
            [
                "name"=> "Other Leave",
            ],
            [
                "name"=> "Religious",
            ]
        ]);
    }
}
