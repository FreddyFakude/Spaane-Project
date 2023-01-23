<?php


namespace App\WhatsApp;


use App\Models\CompanyEmployeeChat;
use App\Models\Employee;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;

class WhatsApp
{
    public function __construct()
    {
        $sid = env("TWILIO_ACCOUNT_SID");
        $token = env("TWILIO_AUTH_TOKEN");
        $this->twilio = new Client($sid, $token);
    }

    public function sendWhatsappMessage(CompanyEmployeeChat $chat, Employee $user, $messageBody, $outBoundMessage=true, $filePath=null, $automatedMessageId=null){
        try {
            //I know it looks ugly my different php installtons got mixed up lol

            $content = $filePath ? ["from" => "whatsapp:" . env('PHONE_NUMBER'), "MediaUrl" => [$filePath]] : ["from" => "whatsapp:" . env('PHONE_NUMBER'), "body" => $messageBody];
            $message = $this->twilio->messages
                ->create("whatsapp:+" . $user->mobile_number, // to
                    $content
                );
        }
        catch (\Exception $exception){
            throw $exception;
//            return abort(500);
        }

        return $this->saveMessage($chat, $messageBody, $outBoundMessage, $filePath, $automatedMessageId, $message->sid);
    }

    public function saveMessage(CompanyEmployeeChat $chat, $messageBody, $outBoundMessage,$filePath=null, $automatedMessageId=null, $sid=null){


        //if it is an automated message and is going out, it is an automated response
        if ($automatedMessageId && $outBoundMessage){
            $messageableType = "App\Models\AutomatedResponder";
            $messageableId = 1;
        }

        //if it is not going out and is not an automated response then it is from a user
        if(!$outBoundMessage && !$automatedMessageId) {
            $messageableType = "App\Models\User";
            $messageableId = $chat->user->id;
        }
        return Message::create([
            "content"=> $messageBody,
            "chat_id"=> $chat->id,
            "is_outbound"=>$outBoundMessage,
            "file_path"=>$filePath,
            "automated_response_id"=>$automatedMessageId,
            "messageable_type" => $messageableType,
            "messageable_id" => $messageableId,
            "message_unique_id" => $sid
        ]);
    }


}
