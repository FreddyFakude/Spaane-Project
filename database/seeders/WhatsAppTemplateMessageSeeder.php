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
                'id' =>1,
                'content' => 'Welcome to %s',
                "slug" => "welcome.user.message"
            ],
            [
                'id'=>2,
                'content' => 'Good Day, your number is not registered with any company. Please choose the option below.
1. Chat with Teambix
2. Learn more about us',
                "slug" => "guest.welcome"
            ],
            [
                'id'  => 3,
                'content' => 'Please type your message and we wil get back to you.',
                "slug" => "guest.chat"
            ]
        ]);
    }
}
