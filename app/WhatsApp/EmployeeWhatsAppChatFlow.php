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
        if (in_array($this->receivedMessage, [1, "Download payslip"])){
          return  $this->optionOne();
        }
        if (in_array($this->receivedMessage, [2, "Update your information"])){
          return  $this->stepTwo();
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

    public function stepTwo()
    {
        $message =  $this->appTemplateMessageRepository->getMessageBySlug('employee.update.profile');
        return $this->whatsApp->sendWhatsappMessage($this->chat, $this->employee, sprintf($message->content, route('employee.login.form')), "App\Models\Company", $this->employee->id, true, true);
    }
}
