<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Employee;
use App\Models\Message;
use App\Repository\ChatRepository;
use App\WhatsApp\WhatsApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyChatController extends Controller
{

    private WhatsApp $whatsApp;

    public function __construct(WhatsApp $whatsApp)
    {
        $this->whatsApp = $whatsApp;
    }

    public function chats()
    {

        return view('dashboard.company.chats', [
            'chats'=> Auth::user()->chats
        ]);
    }

    public function startChat(Employee $employee){
        $chat  = Chat::firstOrCreate([
            'company_account_administrator_id' => Auth::id(),
            'employee_id' => $employee->id,
        ], [
            'company_id'=> Auth::user()->company->id,
            'company_account_administrator_id' => Auth::id(),
            'hash' => sha1(time())
        ]);

        return view('dashboard.company.chat', [
            'chat'=> $chat->load('messages'),
            'employee' => $employee
        ]);
    }

    public function chat(Chat $chat)
    {
        return view('dashboard.company.chat', [
            'chat'=> $chat->load('messages'),
            'employee' => $chat->employee
        ]);
    }

    public function loadMessages(Chat $chat)
    {
        return $chat->messages;
    }

    public function sendMessages(Request $request, Chat $chat)
    {
        $request->validate([
            'chat_hash' => 'required',
            'message' => 'required'
        ]);

        $this->whatsApp->saveReceivedWhatsappMessage($chat, "App\Models\Employee", $chat->employee_id, "");

        return Message::create([
            'messageable_type' => 'App\Models\Company',
            'messageable_id' => Auth::id(),
            'chat_id' => $chat->id,
            'message' => $request->input('message'),
            'is_read' => false
        ]);

    }
}
