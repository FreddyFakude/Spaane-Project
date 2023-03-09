<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Jobs\WhatsAppMessageBatchNotificationJob;
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
            'message' => 'required',
           'file' => 'nullable|file|mimes:jpeg,png,jpg,pdf,doc,docx,xls,xlsx|max:2048'
        ]);

       if($request->hasFile('file')){
          $file = $request->file('file');
          $fileName = str_replace( ' ', '-', Auth::user()->company->name) . "-".  sha1(time()) . "." . $file->getClientOriginalExtension();
          $path = $file->storePubliclyAs('resources', $fileName,'public');
       }
        $this->whatsApp->sendWhatsappMessage($chat, $chat->employee, $validated['message'],"App\Models\Company", Auth::user()->company_id,true, false, $request->hasFile('file') ? asset('storage/' . $path) : null);

          return response()->json([
              'status' => 'success',
              'message' => 'Message sent successfully'
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
            'message' => 'required',
            'title' => 'required',
        ]);

        $bulkMessage = BulkMessage::create([
            "company_id" => Auth::user()->company_id,
            "message" => $validated['message'],
            "title" => $validated['title']
        ]);

        WhatsAppMessageBatchNotificationJob::dispatch($bulkMessage)->delay(now()->addSeconds(5));

        session()->flash('bulk-message-created');
        return back();
    }
}
