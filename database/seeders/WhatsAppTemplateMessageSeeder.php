<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WhatsAppTemplateMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        \DB::table("whats_app_template_messages")->insert([
            [
                'content' => 'Welcome to {$companyName}',
                "slug" => "welcome.message"
            ]
        ]);
    }
}
