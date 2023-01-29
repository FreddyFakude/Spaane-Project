<?php


namespace App\WhatsApp;


use App\Models\Chat;
use App\Models\Employee;
use App\PDF\PayslipPDFGenerator;
use App\Repository\WhatsAppTemplateMessageRepository;

class EmployeeWhatsAppChatFlow
{


    public function __construct(Employee $employee, Chat $chat, $receivedMessage)
    {
        $this->employee = $employee;
        $this->chat = $chat;
        $this->receivedMessage = $receivedMessage;
        $this->appTemplateMessageRepository = new WhatsAppTemplateMessageRepository();
        $this->whatsApp = new WhatsApp();
        $this->payslipPDFGenerator  = new PayslipPDFGenerator();
    }

    public function reply()
    {
        $this->checkSteps();
    }

    public function checkSteps()
    {
        if ($this->receivedMessage == 1){
          return  $this->optionOne();
        }
        else{
            $this->welcome();
        }
    }

    public function welcome()
    {
        $message =  $this->appTemplateMessageRepository->getMessageBySlug('employee.welcome');
        return $this->whatsApp->sendWhatsappMessage($this->chat, $this->employee, sprintf($message->content, $this->employee->name, $this->employee->company->name), "App\Models\Company", $this->employee->id, true, true);
    }

    public function optionOne(){
        $payslip  = $this->payslipPDFGenerator->generatePDf($this->employee);
        $payslipPath = $this->payslipPDFGenerator->filePublicUrl($payslip);
        $message =  $this->appTemplateMessageRepository->getMessageBySlug('employee.chat');
        return $this->whatsApp->sendWhatsappMessage($this->chat, $this->employee, sprintf($message->content, $this->employee->first_name), "App\Models\Company", $this->employee->id, true, true, $payslipPath);
    }
}
