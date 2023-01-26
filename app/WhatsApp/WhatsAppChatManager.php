<?php


namespace App\WhatsApp;


use App\Models\Chat;
use App\Models\Employee;
use App\Models\GuestWhatsAppUser;
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
            return $this->conversationWithGuest($employee, $chat);
        }

        return $this->conversationWithEmployee($employee, $chat);
    }

    protected function conversationWithEmployee(Employee $employee, Chat $chat)
    {
            $message =  $this->appTemplateMessageRepository->getMessageBySlug('welcome.user.message');
            return $this->whatsApp->sendWhatsappMessage($chat, $employee, sprintf($message->content, $employee->first_name), "App\Models\Company", $employee->id, true, true);
    }

    protected function conversationWithGuest(Employee $guest, Chat $chat)
    {
        $message =  $this->appTemplateMessageRepository->getMessageBySlug('user.unregistered');
        return $this->whatsApp->sendWhatsappMessage($chat, $guest, sprintf($message->content, $guest->first_name), "App\Models\Company", $guest->id, true, true);
    }


    protected function findOrStartConversationWithEmployee(Employee $employee): Chat
    {
        return
            Chat::firstOrCreate(
            ['chatable_id'=>$employee->id, 'chatable_type'=> "App\Models\Employee", "status" => Chat::STATUS['opened']],
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
}
