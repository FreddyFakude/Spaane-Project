<?php

namespace App\Notifications;

use App\Models\Employee;
use App\Repository\WhatsAppTemplateMessageRepository;
use App\WhatsApp\WhatsApp;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WhatsAppUpdateToUserNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $appTemplateMessageRepository;
    private $whatsApp;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->appTemplateMessageRepository = new WhatsAppTemplateMessageRepository();
        $this->whatsApp = new WhatsApp();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [WhatsAppChannel::class];
    }

    /**
     *
     *
     * @param  mixed  $notifiable
     * @return mixed
     */
    public function toWhatsapp($notifiable)
    {
        $message =  $this->appTemplateMessageRepository->getMessageBySlug('employee.update.message');
        return $this->whatsApp->sendWhatsappMessage($notifiable->chats->last(), $notifiable, $message->content, "App\Models\Company", $notifiable->id, true, true);
    }
}
