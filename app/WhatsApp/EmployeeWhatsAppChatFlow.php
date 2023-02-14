<?php


namespace App\WhatsApp;


use App\Models\Chat;
use App\Models\Employee;
use App\Models\EmployeeLeave;
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

        if ($this->receivedMessage == in_array(strtolower($this->receivedMessage),  ['exit', 'help'])){
          return  $this->welcome();
        }

        if(session()->has("chat-{$this->employee->mobile_number}-leave-management-expecting-days")){
            return  $this->stepFive();
        }

        if(session()->has("chat-{$this->employee->mobile_number}-leave-management") && in_array($this->receivedMessage, [1, "Check Leave Days"])){
            return  $this->stepSix();
        }

        if(session()->has("chat-{$this->employee->mobile_number}-leave-management") && in_array($this->receivedMessage, [2, "Apply For Leave Days"])){
            return  $this->stepFour();
        }

        if (in_array($this->receivedMessage, [1, "Download the payslip"])){
          return  $this->optionOne();
        }
        if (in_array($this->receivedMessage, [2, "Update your info"])){
          return  $this->stepTwo();
        }
        if (in_array($this->receivedMessage, [3, "More Options"])){
          return  $this->stepThree();
        }
        if (in_array($this->receivedMessage, ["See The Update"])){
          return  $this->stepSeven();
        }
        else{
            $this->welcome();
        }
    }

    public function welcome()
    {
        session()->remove("chat-{$this->employee->mobile_number}-leave-management");
        session()->remove("chat-{$this->employee->mobile_number}-leave-management-expecting-days");
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

    public function stepThree()
    {
        session(["chat-{$this->employee->mobile_number}-leave-management" =>  session("chat-{$this->employee->mobile_number}-custom-message") +  rand(0, 1000)]);
        $message =  $this->appTemplateMessageRepository->getMessageBySlug('employee.leave.management');
        return $this->whatsApp->sendWhatsappMessage($this->chat, $this->employee, sprintf($message->content, route('employee.login.form')), "App\Models\Company", $this->employee->id, true, true);
    }

    public function stepFour()
    {
        session(["chat-{$this->employee->mobile_number}-leave-management-expecting-days" =>  session("chat-{$this->employee->mobile_number}-leave-management-expecting-days") +  1]);
        $message =  $this->appTemplateMessageRepository->getMessageBySlug('employee.leave.management.request');
        return $this->whatsApp->sendWhatsappMessage($this->chat, $this->employee, $message->content, "App\Models\Company", $this->employee->id, true, true);
    }

    public function stepFive()
    {
       $days =  filter_var($this->receivedMessage, FILTER_VALIDATE_INT);
        if(!$days){
            return $this->whatsApp->sendWhatsappMessage($this->chat, $this->employee, "Please type a number", "App\Models\Company", $this->employee->id, true, true);
        }

        $availableLeaveDays = $this->employee->leaveDays->last();
        if(intval($availableLeaveDays->days) < intval($this->receivedMessage)){
            $daysLeft = intval($availableLeaveDays->days) -  $availableLeaveDays->leaves->where('status','APPROVED')->sum('requested_days');
            return $this->whatsApp->sendWhatsappMessage($this->chat, $this->employee, "The number of days requested is more than the number of days available to you. You have {$daysLeft} days left. Please type a number lesser than that or type exit to stop this prompt", "App\Models\Company", $this->employee->id, true, true);
        }

        $leave = EmployeeLeave::create([
            "employee_id" => $this->employee->id,
            "requested_days" => $this->receivedMessage,
            "employee_leave_day_id" => $availableLeaveDays->id
        ]);

        session()->remove("chat-{$this->employee->mobile_number}-leave-management");
        session()->remove("chat-{$this->employee->mobile_number}-leave-management-expecting-days");
        return $this->whatsApp->sendWhatsappMessage($this->chat, $this->employee, "Your leave request has been sent. Please type help or exit to return to the main menu", "App\Models\Company", $this->employee->id, true, true);

    }

    public function stepSix()
    {
        $availableLeaveDays = $this->employee->leaveDays->last();

        $daysLeft = intval($availableLeaveDays->days) -  $availableLeaveDays->leaves->where('status','APPROVED')->sum('requested_days');

        session()->remove("chat-{$this->employee->mobile_number}-leave-management");
        session()->remove("chat-{$this->employee->mobile_number}-leave-management-expecting-days");
        return $this->whatsApp->sendWhatsappMessage($this->chat, $this->employee, "You have {$daysLeft} leave days left. Please type a number lesser than that or type exit to stop this prompt", "App\Models\Company", $this->employee->id, true, true);
    }

    public function stepSeven()
    {
       $bulkMessages =  $this->employee->bulkMessages()->pending()->get();
        foreach($bulkMessages as $message){
            $this->whatsApp->sendWhatsappMessage($this->chat, $this->employee, $message->message->message, "App\Models\Company", $this->employee->id, true, true);
            return    $message->update([
                    "status" => "SENT"
                ]);
        }
    }
}
