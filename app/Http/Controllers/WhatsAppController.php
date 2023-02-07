<?php

namespace App\Http\Controllers;



use App\Http\Requests\WhatsAppMessageRequest;
use App\Repository\ChatRepository;
use App\WhatsApp\WhatsApp;
use App\WhatsApp\WhatsAppChatManager;

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
        return response()->json('success', 200);
    }
}
