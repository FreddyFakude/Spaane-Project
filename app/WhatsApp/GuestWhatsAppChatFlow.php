<?php


namespace App\WhatsApp;


use App\Models\Chat;
use App\Models\Employee;
use App\Repository\WhatsAppTemplateMessageRepository;

class GuestWhatsAppChatFlow
{


    public function __construct(Employee $guest, Chat $chat, $receivedMessage)
    {
        $this->guest = $guest;
        $this->chat = $chat;
        $this->receivedMessage = $receivedMessage;
        $this->appTemplateMessageRepository = new WhatsAppTemplateMessageRepository();
        $this->whatsApp = new WhatsApp();
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
        $message =  $this->appTemplateMessageRepository->getMessageBySlug('guest.welcome');
        return $this->whatsApp->sendWhatsappMessage($this->chat, $this->guest, sprintf($message->content, $this->guest->first_name), "App\Models\Company", $this->guest->id, true, true);
    }

    public function optionOne(){
        session('expected_message', $this->guest->mobile_number);
        $message =  $this->appTemplateMessageRepository->getMessageBySlug('guest.chat');
        return $this->whatsApp->sendWhatsappMessage($this->chat, $this->guest, sprintf($message->content, $this->guest->first_name), "App\Models\Company", $this->guest->id, true, true);
    }
}
