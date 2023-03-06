<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            [
                'id' => '1',
                'addressable_type' => 'App\Models\Company',
                'addressable_id' => '1',
                'street_name' => 'Merriman ave',
                'street_number' => '44',
                'city' => 'Stellenbosch',
                'state' => 'Western Cape',
                'country' => 'South Africa',
                'zip_code' => '7600',
                'created_at' => '2019-11-12 00:00:00',
                'updated_at' => '2019-11-12 00:00:00'
            ]
        ]);
    }
}
