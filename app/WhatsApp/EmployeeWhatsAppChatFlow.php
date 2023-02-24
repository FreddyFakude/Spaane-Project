<?php


namespace App\WhatsApp;


use App\Models\Chat;
use App\Models\Employee;
use App\Models\EmployeeLeave;
use App\PDF\PayslipPDFGenerator;
use App\Repository\WhatsAppTemplateMessageRepository;
use Carbon\Carbon;

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

        if(session()->has("chat-{$this->employee->mobile_number}-leave-management-expecting-date") && $this->receivedMessage !== "Confirm submission"){
            return  $this->stepFive();
        }

        if(session()->has("chat-{$this->employee->mobile_number}-leave-management") && in_array($this->receivedMessage, [1, "Check Leave Days"])){
            return  $this->stepSix();
        }

        if(session()->has("chat-{$this->employee->mobile_number}-leave-management") && in_array($this->receivedMessage, [2, "Apply For Leave Days"])){
            return  $this->stepFour();
        }


        if(session()->has("chat-{$this->employee->mobile_number}-inputted-leave-days") && in_array($this->receivedMessage, [2, "Confirm submission"])){
            return  $this->submitLeaveDates();
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
        session()->remove("chat-{$this->employee->mobile_number}-leave-management-expecting-date");
        session()->remove("chat-{$this->employee->mobile_number}-inputted-leave-days");
        session()->remove("chat-{$this->employee->mobile_number}-inputted-leave-days_array");
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
        session(["chat-{$this->employee->mobile_number}-leave-management-expecting-date" =>  rand(0, 1000)]);
        $message =  $this->appTemplateMessageRepository->getMessageBySlug('employee.leave.management.request');
        return $this->whatsApp->sendWhatsappMessage($this->chat, $this->employee, $message->content . session("chat-{$this->employee->mobile_number}-leave-management-expecting-date"), "App\Models\Company", $this->employee->id, true, true);
    }

    public function stepFive()
    {
       $date = Carbon::createFromFormat("d/m/Y", $this->receivedMessage);
        if($date->isPast() || $date->isToday()){
            return $this->whatsApp->sendWhatsappMessage($this->chat, $this->employee, "Please enter a date in the future", "App\Models\Company", $this->employee->id, true, true);
        }

        if(session()->has("chat-{$this->employee->mobile_number}-inputted-leave-days")){
            if (strpos(session("chat-{$this->employee->mobile_number}-inputted-leave-days"), $this->receivedMessage) !== false) {
                return $this->whatsApp->sendWhatsappMessage($this->chat, $this->employee, "You have already entered this date. Please enter another date or type exit to stop this prompt. These are the current recorded dates: " .  session("chat-{$this->employee->mobile_number}-inputted-leave-days"). " Type another date in the same format or type: 'Confirm submission'. Without the ''", "App\Models\Company", $this->employee->id, true, true);
            }
            session(["chat-{$this->employee->mobile_number}-inputted-leave-days" =>  session("chat-{$this->employee->mobile_number}-inputted-leave-days") . " - " . $this->receivedMessage]);
            $array = session("chat-{$this->employee->mobile_number}-inputted-leave-days_array");
            session(["chat-{$this->employee->mobile_number}-inputted-leave-days_array" =>  array_merge($array, [$date])]);
        }
        else{
            session(["chat-{$this->employee->mobile_number}-inputted-leave-days" => $this->receivedMessage]);
            session(["chat-{$this->employee->mobile_number}-inputted-leave-days_array" =>  [$date]]);
        }

        return $this->whatsApp->sendWhatsappMessage($this->chat, $this->employee, "These are the dates : " . session("chat-{$this->employee->mobile_number}-inputted-leave-days"). " Type another date in the same format or type: 'Confirm submission'. Without the ''", "App\Models\Company", $this->employee->id, true, true);

    }

    public function stepSix()
    {
        $daysLeft = $this->employee->currentLeaveDays;
        session()->remove("chat-{$this->employee->mobile_number}-leave-management");
        session()->remove("chat-{$this->employee->mobile_number}-leave-management-expecting-date");
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


    public function submitLeaveDates()
    {
        $currentLeave = $this->employee->leaveDays->last();
        foreach (session("chat-{$this->employee->mobile_number}-inputted-leave-days_array") as $date){
            $leave = EmployeeLeave::create([
                "employee_id" => $this->employee->id,
                "requested_date" => $date->format("Y-m-d"),
                "employee_leave_day_id" => $currentLeave->id,
                "hash" => sha1(time())
            ]);
        }

        session()->remove("chat-{$this->employee->mobile_number}-leave-management-expecting-date");
        session()->remove("chat-{$this->employee->mobile_number}-inputted-leave-days");
        session()->remove("chat-{$this->employee->mobile_number}-inputted-leave-days_array");
        return $this->whatsApp->sendWhatsappMessage($this->chat, $this->employee, "Your leave days have been successfully submitted", "App\Models\Company", $this->employee->id, true, true);

    }
}
