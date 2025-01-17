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
                'content' => env('APP_ENV') == 'local' ? 'Hi  %s, How can we assist you today?
1. Download payslip
2. Update your information
3. More Options' : 'Hi  %s, How can we assist you today? ',
                "slug" => "employee.welcome"
            ],
            [
                'content' => env('APP_ENV') == 'local' ? 'More options
1. Check Leave Days
2. Apply For Leave Days' : 'More options',
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
                'content' => 'Please input the date you would like to request a leave for in the format dd-mm-yyyy(e.g: 30-12-2023)',
                "slug" => "employee.leave.management.request"
            ],
            [
                'content' => "Please login here ". route('employee.login.form') . " to update your profile",
                "slug" => "employee.update.profile"
            ],
            [
                'content' => "Good day %s, %s has an update for you.",
                "slug" => "employee.update.message"
            ],
            [
                'content' => "Welcome to Teambix. You have been added to the %s account. Login details have been sent to your email, please click the link below to complete your profile. %s",
                "slug" => "employee.new-profile.added"
            ],
            [
                'content' => "Sorry, we could not find your payslip for the month of  %s",
                "slug" => "employee.payslip.not.found"
            ],
            [
                'content' => env('APP_ENV') == 'local' ?  " For which month would you like to download the payslip? \n
                1. Past month
                2. 2 months ago
                3. 3 months ago" : "Please select the month you would like to download",
                "slug" => "employee.payslip.choose.month"
            ]
        ]);
    }
}
