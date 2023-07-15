<?php

namespace Database\Seeders;

use App\Models\Chat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Chat::firstOrCreate(
            ['chatable_id'=>1, 'chatable_type'=> "App\Models\Employee"],
            [
                'company_id'=> 1,
                'company_account_administrator_id' => 1,
                'hash'=> sha1(time() . rand(1, 100000))
            ]
        );
    }
}
