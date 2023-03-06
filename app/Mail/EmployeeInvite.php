<?php


namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmployeeInvite extends Mailable
{

    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */


    public $firstName;
    public $companyName;
    public $companyAdminAccount;
    public function __construct($firstName, $companyAdminAccount)
    {
        $this->firstName = $firstName;
        $this->companyAdminAccount = $companyAdminAccount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.business.invite_employee');
    }
}
