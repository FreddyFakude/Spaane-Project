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
                'content' => 'Welcome to %s',
                "slug" => "welcome.user.message"
            ],
            [
                'content' => env('APP_ENV') == 'local' ?  'Good Day, your number is not registered with any company. Please choose the option below.
1. Chat with Teambix
2. Learn more about us' : 'Good Day, your number is not registered with any company. Please choose the option below.' ,
                "slug" => "guest.welcome"
            ],
            [
                'content' => 'Please type your message and we wil get back to you.',
                "slug" => "guest.chat"
            ],
            [
                'content' => env('APP_ENV') == 'local' ? 'Hi  %s, How can we help you today. What would you like to do:
1. Download payslip
2. Update your information
3. Check for leave days' : 'Hi  %s, How can we help you today. What would you like to do:',
                "slug" => "employee.welcome"
            ],
            [
                'content' => env('APP_ENV') == 'local' ?
'Please select the below:
1. Apply for leave
2. Check Leave Days' : 'Please select the below:',
                "slug" => "employee.leave.management"
            ],
            [
                'content' => 'Please type your message and we wil get back to you.',
                "slug" => "employee.chat"
            ],
            [
                'content' => 'Please visit teambix.com for more information',
                "slug" => "guest.learn-more"
            ],
            [
                'content' => 'How many days would you like to request',
                "slug" => "employee.leave.management.request"
            ]
        ]);
    }
}
