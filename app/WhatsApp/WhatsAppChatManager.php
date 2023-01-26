<?php


namespace App\WhatsApp;


use App\Models\Chat;
use App\Models\Employee;
use App\Repository\ChatRepository;
use App\Repository\WhatsAppEmployeeRepository;
use App\Repository\WhatsAppTemplateMessageRepository;

class WhatsAppChatManager
{

    /**
     * WhatsAppConversationManager constructor.
     */
    public function __construct(ChatRepository $chatRepository, WhatsAppEmployeeRepository $employeeRepository, WhatsAppTemplateMessageRepository $appTemplateMessageRepository)
    {
        $this->chatRepository = $chatRepository;
        $this->employeeRepository = $employeeRepository;
        $this->appTemplateMessageRepository = $appTemplateMessageRepository;
    }

    public function processConversation($payload)
    {
        if (!$employee = $this->isEmployeeRegistered($payload['WaId'])){
            return $this->appTemplateMessageRepository->getMessageBySlug('user.unregistered');
        }

        $this->findOrStartConversation($employee);

        $this->whatsApp->saveReceivedWhatsappMessage($chat, "App\Models\Employee", $chat->employee_id, $validated["Body"], $validated["MessageSid"], false);

    }

    public function findOrStartConversation(Employee $employee): Chat
    {
        return
            Chat::firstOrCreate(
            ['employee_id'=>$employee->id],
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
}
