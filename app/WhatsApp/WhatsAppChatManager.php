<?php


namespace App\WhatsApp;


use App\Models\Chat;
use App\Models\Employee;
use App\Repository\ChatRepository;
use App\Repository\WhatsAppEmployeeRepository;
use App\Repository\WhatsAppTemplateMessageRepository;
use Illuminate\Support\Facades\Hash;

class WhatsAppChatManager
{

    /**
     * WhatsAppConversationManager constructor.
     */
    public function __construct(ChatRepository $chatRepository, WhatsAppEmployeeRepository $employeeRepository, WhatsAppTemplateMessageRepository $appTemplateMessageRepository, WhatsApp $whatsApp)
    {
        $this->chatRepository = $chatRepository;
        $this->employeeRepository = $employeeRepository;
        $this->appTemplateMessageRepository = $appTemplateMessageRepository;
        $this->whatsApp = $whatsApp;
    }

    public function processConversation($payload)
    {
        if (!$employee = $this->isEmployeeRegistered($payload['WaId'])){
                $employee = $this->addGuestUser($payload);
        }

        $chat =  $this->findOrStartConversationWithEmployee($employee);
        $this->whatsApp->saveReceivedWhatsappMessage($chat, "App\Models\Employee", $employee->id, $payload['Body'], $payload['MessageSid'], false, false);

        if ($employee->status == Employee::STATUS['guest']){
            return $this->conversationWithGuest($employee, $chat, $payload['Body']);
        }

        return $this->conversationWithEmployee($employee, $chat, $payload['Body']);
    }

    protected function conversationWithEmployee(Employee $employee, Chat $chat, $receivedMessage)
    {
        (new EmployeeWhatsAppChatFlow($employee, $chat, $receivedMessage))->reply();
        return true;
    }

    protected function conversationWithGuest(Employee $guest, Chat $chat, $receivedMessage)
    {
        (new GuestWhatsAppChatFlow($guest, $chat, $receivedMessage))->reply();
        return true;
    }


    protected function findOrStartConversationWithEmployee(Employee $employee): Chat
    {
        return
            Chat::firstOrCreate(
            ['chatable_id'=>$employee->id, 'chatable_type'=> "App\Models\Employee"],
            [
                'company_id'=>$employee->company->id,
                'company_account_administrator_id' => $employee->company->administrator->id,
                'hash'=> sha1(time() . rand(1, 100000))
            ]
        );
    }

    public function isEmployeeRegistered(int $phoneNumber)
    {
       return $this->employeeRepository->getEmployeeByPhoneNumber($phoneNumber);
    }

    public function AddGuestUser(array $userData): Employee
    {
       return  Employee::create([
            "name" => "Unregistered",
            "email" => "email-{$userData['WaId']}@unregistered.com",
            'mobile_number' => $userData['WaId'],
            "marital_status" => '',
            "company_id" => 1,
           "company_department_id" => 17,
            "password" => Hash::make('password'),
            "status" => Employee::STATUS['guest'],
        ]);
    }

    public function sendWhatsAppMessageToEmployee(Employee $employee, $message)
    {
        $chat =  $this->findOrStartConversationWithEmployee($employee);
        $this->whatsApp->sendWhatsappMessage($chat, $employee, $message, "App\Models\Employee", $employee->id, true, false);
        return true;
    }
}
