<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Jobs\BatchMessageNotification;
use App\Models\BulkMessage;
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
//        dd(Auth::user()->chats);
        return view('dashboard.company.chats', [
            'chats'=> Auth::user()->chats
        ]);
    }

    public function startChat(Employee $employee){
        $chat  = Chat::firstOrCreate([
            'company_account_administrator_id' => Auth::id(),
            'chatable_id' => $employee->id,
            'chatable_type' => "App\Models\Employee",
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
       $validated =  $request->validate([
            'chat_hash' => 'required',
            'message' => 'required'
        ]);

        $this->whatsApp->sendWhatsappMessage($chat, $chat->employee, $validated['message'],"App\Models\Company", Auth::user()->company_id,true, false);

        return Message::create([
            'messageable_type' => 'App\Models\Company',
            'messageable_id' => Auth::id(),
            'chat_id' => $chat->id,
            'message' => $request->input('message'),
            'is_read' => false
        ]);

    }

    public function bulkMessages()
    {

        return view('dashboard.company.bulk-messages', [
            'messages'=> Auth::user()->bulkMessages
        ]);
    }

    public function sendBulkMessages(Request $request)
    {
        $validated =  $request->validate([
            'message' => 'required'
        ]);

        $bulkMessage = BulkMessage::create([
            "company_id" => Auth::user()->company_id,
            "message" => $validated['message']
        ]);

        BatchMessageNotification::dispatch($bulkMessage)->delay(now()->addSeconds(5));

        session()->flash('bulk-message-created');
        return back();
    }
}
