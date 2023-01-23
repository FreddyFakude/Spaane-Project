<?php

namespace App\Http\Controllers;



use App\Models\CompanyEmployeeChat;
use App\Models\Employee;
use App\Repository\ChatRepository;
use App\WhatsApp\WhatsApp;
use Illuminate\Http\Request;

class WhatsAppController extends Controller
{
    private WhatsApp $whatsApp;
    private ChatRepository $repository;

    /**
     * WhatsAppController constructor.
     */
    public function __construct(WhatsApp $whatsApp, ChatRepository $repository)
    {
        $this->whatsApp = $whatsApp;
        $this->repository = $repository;
    }
    public function receiveMessage(Request $request)
    {
        $validate = $request->validate([
            'WaId' => 'required|exists:employees,mobile_number'
        ]);

        $talent = Employee::firstWhere([
            'mobile_number' => $request->input('WaId')
        ]);

        $chat = CompanyEmployeeChat::firstOrCreate(
            ['employee_id'=>$talent->id],
            [
                'company_id'=>$talent->company->id,
                'company_account_administrator_id' => $talent->company->administrator->id,
                'hash'=> sha1(time() . rand(1, 100000))
            ]
        );

//        $this->whatsApp->saveMessage($chat, 'Hello World', false);

        $this->whatsApp->sendWhatsappMessage($chat, $talent, 'Hello World', true);
    }
}
