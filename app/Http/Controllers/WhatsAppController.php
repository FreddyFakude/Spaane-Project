<?php

namespace App\Http\Controllers;



use App\Http\Requests\WhatsAppMessageRequest;
use App\Repository\ChatRepository;
use App\Services\WhatsApp\WhatsApp;
use App\Services\WhatsApp\WhatsAppChatManager;
use Validator;

class WhatsAppController extends Controller
{
    private WhatsApp $whatsApp;
    private ChatRepository $repository;

    /**
     * WhatsAppController constructor.
     */
    public function __construct(WhatsApp $whatsApp, ChatRepository $repository, WhatsAppChatManager $chatManager)
    {
        $this->whatsApp = $whatsApp;
        $this->repository = $repository;
        $this->chatManager = $chatManager;
    }
    public function receiveMessage(WhatsAppMessageRequest $request)
    {
        $validated = $request->validated();

        //if the message is a date, then we are expecting a date
        if (session()->has("chat-{$validated['WaId']}-leave-management-expecting-date") && !in_array(strtolower($validated['Body']),  ['exit', 'help']) ){
           if ($validated['Body'] != "Confirm submission"){
               $validator =  Validator::make($request->all(), [
                   "Body"=>"required|date_format:d/m/Y"
               ]);

               if ($validator->fails()){
                   (new  WhatsApp)->sendQuickWhatsApp($validated['WaId'], "Please enter a valid date or type exit to stop");
                   return response()->json('success');
               }
           }
           else if ($validated['Body'] == "Confirm submission"){
               if(!session()->has("chat-{$validated['WaId']}-inputted-leave-days")){
                   (new  WhatsApp)->sendQuickWhatsApp($validated['WaId'], "Please submit dates first");
                   return response()->json('success');
               }

           }
        }

        $this->chatManager->processConversation($validated);
        return response()->json('success', 200);
    }
}
