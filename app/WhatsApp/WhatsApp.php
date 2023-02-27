<?php


namespace App\WhatsApp;


use App\Models\Chat;
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

    public function sendWhatsappMessage(Chat $chat, Employee $user, $messageBody, $modelPath, $modelId, $outBoundMessage=true, $automated=null, $filePath=null){
        try {

            $content = $filePath ? ["from" => "whatsapp:" . env('PHONE_NUMBER'), "MediaUrl" => [$filePath]] : ["from" => "whatsapp:" . env('PHONE_NUMBER'), "body" => $messageBody];
            $message = $this->twilio->messages
                ->create("whatsapp:+" . $user->mobile_number, // to
                    $content
                );
            info($message);
        }
        catch (\Exception $exception){
            throw $exception;
//            return abort(500);
        }

        return $this->saveMessage($chat, $messageBody,  $modelPath, $modelId, $outBoundMessage, $automated, $message->sid, $filePath, "");
    }

    public function saveReceivedWhatsappMessage(Chat $chat, $modelPath, $modelId, $messageBody, $sid, $outBoundMessage=true, $automated=false, $filePath=null)
    {
        return $this->saveMessage($chat, $messageBody, $modelPath, $modelId, $outBoundMessage, $automated, $sid, $filePath);
    }

    private function saveMessage(Chat $chat, $messageBody, $modelNamespace, $modelId, $outBoundMessage, $automated=false, $sid=null, $filePath=null, $fileType=null){

        return Message::create([
            "message"=> $messageBody,
            "chat_id"=> $chat->id,
            "is_outbound"=>$outBoundMessage,
            "file_path"=>$filePath,
            "file_type" => $fileType,
            "is_automated"=>$automated,
            "messageable_type" => $modelNamespace,
            "messageable_id" => $modelId,
            "message_unique_id" => $sid
        ]);
    }

    public function sendQuickWhatsApp($phoneNumber, $messageBody){
        return $this->twilio->messages
            ->create("whatsapp:+" . $phoneNumber, // to
                [
                    "from" => "whatsapp:" .  env('PHONE_NUMBER'),
                    "body" => $messageBody
                ]
            );
    }

}
