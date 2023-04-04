<?php


namespace App\Services\WhatsApp;


use App\Models\Chat;
use App\Models\CompanyLeavePolicy;
use App\Models\Employee;
use App\Models\EmployeeLeavePolicy;
use App\Models\EmployeeLeaveRequest;
use App\Repository\EmployeeLeaveRequestRepository;
use App\Repository\WhatsAppTemplateMessageRepository;
use App\Services\LeaveCalculation;
use App\Services\PDF\PayslipPDFGenerator;
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
        $this->employeeLeaveRequestRepository = new EmployeeLeaveRequestRepository();
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


        if(session()->has("chat-{$this->employee->mobile_number}-leave-management-expecting-policy")){
            if (in_array($this->receivedMessage, \App\Models\LeaveType::all()->pluck('id')->toArray())){
                return  $this->pickLeavePolicy();
            }

        }

        if(session()->has("chat-{$this->employee->mobile_number}-expecting-payslip-month")){
            return  $this->optionOne();
        }
        if (in_array($this->receivedMessage, [1, "Download the payslip"])){
          return  $this->pickPayslipMonth();
        }
        if (in_array($this->receivedMessage, [2, "Update your info"])){
          return  $this->stepTwo();
        }
        if (in_array($this->receivedMessage, [3, "More Options"])){
          return  $this->stepThree();
        }
        if (in_array(strtolower($this->receivedMessage), ["see the update"])){
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
        session()->remove("chat-{$this->employee->mobile_number}-leave-management-expecting-policy");
        session()->remove("chat-{$this->employee->mobile_number}-leave-management-leave_policy");
        session()->remove("chat-{$this->employee->mobile_number}-expecting-payslip-month");
        $message =  $this->appTemplateMessageRepository->getMessageBySlug('employee.welcome');
        return $this->whatsApp->sendWhatsappMessage($this->chat, $this->employee, sprintf($message->content, $this->employee->name, $this->employee->company->name), "App\Models\Company", $this->employee->id, true, true);
    }

    public function pickPayslipMonth()
    {
        $message =  $this->appTemplateMessageRepository->getMessageBySlug('employee.payslip.choose.month');
        session(["chat-{$this->employee->mobile_number}-expecting-payslip-month"=> rand(0, 1000)]);
        return $this->whatsApp->sendWhatsappMessage($this->chat, $this->employee, $message->content, "App\Models\Company", $this->employee->id, true, true);

    }
    public function optionOne(){
        if (in_array($this->receivedMessage, [1, "Past month"])){
            $month = 1;
        }
        else if (in_array($this->receivedMessage, [2, "2 months ago"])){
            $month = 2;
        }
       else if (in_array($this->receivedMessage, [3, "3 months ago"])){
            $month = 3;
        }
        else{
            $month = 1;
        }

        $date = Carbon::now()->subMonth($month)->format('Y-m');
        $payslip = $this->employee->payslips()->where('month_year', $date)->first();
        if (!$payslip){
            session()->remove("chat-{$this->employee->mobile_number}-expecting-payslip-month");
            return $this->whatsApp->sendWhatsappMessage($this->chat, $this->employee, "There is no payslip for the month requested. Please try again later or contact your company HR. Press 1 or exit to restart", "App\Models\Company", $this->employee->id, true, true);
        }
        $pdf  = $this->payslipPDFGenerator->generatePDf($this->employee, $payslip);
        $payslipPath = $this->payslipPDFGenerator->filePublicUrl($pdf);
        $message =  $this->appTemplateMessageRepository->getMessageBySlug('employee.chat');
        session()->remove("chat-{$this->employee->mobile_number}-expecting-payslip-month");

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
        session(["chat-{$this->employee->mobile_number}-leave-management-expecting-policy" =>  rand(0, 1000)]);
        session()->remove("chat-{$this->employee->mobile_number}-leave-management");
        $message =  "Please select the leave policy you want to apply for"  . \PHP_EOL  . \PHP_EOL . \PHP_EOL . \PHP_EOL;
        foreach (\App\Models\LeaveType::all() as $leaveType) {
                $message .= $leaveType->id . ". " . $leaveType->name . \PHP_EOL;
            }
        return $this->whatsApp->sendWhatsappMessage($this->chat, $this->employee, $message, "App\Models\Company", $this->employee->id, true, true);
    }

    public function stepFive()
    {


       $date = Carbon::createFromFormat("d-m-Y", $this->receivedMessage);
        if($date->isPast() || $date->isToday()){
            return $this->whatsApp->sendWhatsappMessage($this->chat, $this->employee, "Please enter a date in the future", "App\Models\Company", $this->employee->id, true, true);
        }

        if(session()->has("chat-{$this->employee->mobile_number}-inputted-leave-days")){
            //limit to 2 dates
            if (count(explode("to" ,session("chat-{$this->employee->mobile_number}-inputted-leave-days"))) == 2) {
                return $this->whatsApp->sendWhatsappMessage($this->chat, $this->employee, "You have entered 2 dates already: " .  session("chat-{$this->employee->mobile_number}-inputted-leave-days"). " Type: 'Confirm submission'. Without the ''", "App\Models\Company", $this->employee->id, true, true);
            }

            if (strpos(session("chat-{$this->employee->mobile_number}-inputted-leave-days"), $this->receivedMessage) !== false) {
                return $this->whatsApp->sendWhatsappMessage($this->chat, $this->employee, "You have already entered this date. Please enter another date or type exit to stop this prompt. These are the current recorded dates: " .  session("chat-{$this->employee->mobile_number}-inputted-leave-days"). " Type another date in the same format or type: 'Confirm submission'. Without the ''", "App\Models\Company", $this->employee->id, true, true);
            }
            session(["chat-{$this->employee->mobile_number}-inputted-leave-days" =>  session("chat-{$this->employee->mobile_number}-inputted-leave-days") . " to " . $this->receivedMessage]);
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
        $leaveDaysLeft = (new LeaveCalculation())->calculateRemainingDaysOnAllLeaveType($this->employee);
        session()->remove("chat-{$this->employee->mobile_number}-leave-management");
        session()->remove("chat-{$this->employee->mobile_number}-leave-management-expecting-date");
        $messageBody = "You have ". \PHP_EOL;;
        if (count($leaveDaysLeft) < 1){
            $messageBody = "You have no leave policy set up. Please contact your HR department.";
        }
       else{
           foreach($leaveDaysLeft as $leaveName => $days){
               $messageBody .=  "{$days} {$leaveName} days left. " . \PHP_EOL;
           }
       }
        return $this->whatsApp->sendWhatsappMessage($this->chat, $this->employee, $messageBody. " Type exit to stop this prompt", "App\Models\Company", $this->employee->id, true, true);
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
        list($startDate, $endDate) = explode("to", session("chat-{$this->employee->mobile_number}-inputted-leave-days"));
        $leavePolicy = EmployeeLeavePolicy::where("employee_id", $this->employee->id)->where("leave_type_id", session("chat-{$this->employee->mobile_number}-leave-management-leave_policy"))->with("initialDay")->get()->first();

        $this->employeeLeaveRequestRepository->insert($this->employee, $leavePolicy->initialDay, $leavePolicy, $startDate, $endDate);

        session()->remove("chat-{$this->employee->mobile_number}-leave-management-expecting-date");
        session()->remove("chat-{$this->employee->mobile_number}-leave-management-leave_policy");
        session()->remove("chat-{$this->employee->mobile_number}-inputted-leave-days");
        session()->remove("chat-{$this->employee->mobile_number}-inputted-leave-days_array");
        return $this->whatsApp->sendWhatsappMessage($this->chat, $this->employee, "Your leave days have been successfully submitted", "App\Models\Company", $this->employee->id, true, true);

    }

    public function pickLeavePolicy()
    {
        //check if company has leave policy
        if (CompanyLeavePolicy::where("company_id", $this->employee->company_id)
                ->where("leave_type_id", $this->receivedMessage)
                ->count() < 1 || EmployeeLeavePolicy::where("employee_id", $this->employee->id)->where("leave_type_id", $this->receivedMessage)->count() < 1){
            return $this->whatsApp->sendWhatsappMessage($this->chat, $this->employee, "Your company does not have any leave policy set up or it is not available to you. Please contact your HR department. Choose another or press exit to get back to the main menu". session("chat-{$this->employee->mobile_number}-leave-management-leave_policy"), "App\Models\Company", $this->employee->id, true, true);
        }

        session(["chat-{$this->employee->mobile_number}-leave-management-leave_policy" =>  $this->receivedMessage]);
        session(["chat-{$this->employee->mobile_number}-leave-management-expecting-date" =>  rand(0, 1000)]);
        session()->remove("chat-{$this->employee->mobile_number}-leave-management-expecting-policy");

        $message =  $this->appTemplateMessageRepository->getMessageBySlug('employee.leave.management.request');
        return $this->whatsApp->sendWhatsappMessage($this->chat, $this->employee, $message->content, "App\Models\Company", $this->employee->id, true, true);

    }
}
