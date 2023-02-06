<?php

namespace App\Http\Controllers;



use App\Http\Requests\WhatsAppMessageRequest;
use App\Models\Chat;
use App\Models\Employee;
use App\Repository\ChatRepository;
use App\WhatsApp\WhatsApp;
use App\WhatsApp\WhatsAppChatManager;
use Illuminate\Http\Request;

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
        $this->chatManager->processConversation($validated);
//        $talent = Employee::firstWhere([
//            'mobile_number' => $request->input('WaId')
//        ]);

//        $chat = Chat::firstOrCreate(
//            ['employee_id'=>$talent->id],
//            [
//                'company_id'=>$talent->company->id,
//                'company_account_administrator_id' => $talent->company->administrator->id,
//                'hash'=> sha1(time() . rand(1, 100000))
//            ]
//        );
//
//        $this->whatsApp->sendWhatsappMessage($chat, $talent, 'Thank you for contacting us.', "App\Models\Company", $talent->company->id, true, true);

        return response()->json('success', 200);
    }
}
