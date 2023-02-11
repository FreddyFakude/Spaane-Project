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

        if ($this->receivedMessage == in_array(strtolower($this->receivedMessage),  ['exit', 'help'])){
            return  $this->welcome();
        }

        if (in_array($this->receivedMessage, [1, "Chat with Teambix"]))
        {
            return  $this->optionOne();
        }

        else if (in_array($this->receivedMessage, [2, "Learn more about us"])){
          return  $this->optionTwo();
        }

        else{
            $this->welcome();
        }
    }

    public function welcome()
    {
        $message =  $this->appTemplateMessageRepository->getMessageBySlug('guest.welcome');
        if (!session()->has("chat-{$this->guest->mobile_number}-custom-message")){
            return $this->whatsApp->sendWhatsappMessage($this->chat, $this->guest, sprintf($message->content, $this->guest->first_name), "App\Models\Company", $this->guest->id, true, true);
        }
    }

    public function optionOne(){
        session()->has("chat-{$this->guest->mobile_number}-custom-message") ? session(["chat-{$this->guest->mobile_number}-custom-message" =>  session("chat-{$this->guest->mobile_number}-custom-message") +  1]) : session(["chat-{$this->guest->mobile_number}-custom-message" => 1]);
        $message =  $this->appTemplateMessageRepository->getMessageBySlug('guest.chat');
        return $this->whatsApp->sendWhatsappMessage($this->chat, $this->guest, sprintf($message->content, $this->guest->first_name), "App\Models\Company", $this->guest->id, true, true);
    }

    public function optionTwo(){
        $message =  $this->appTemplateMessageRepository->getMessageBySlug('guest.learn-more');
        return $this->whatsApp->sendWhatsappMessage($this->chat, $this->guest, sprintf($message->content, $this->guest->first_name), "App\Models\Company", $this->guest->id, true, true);
    }
}
