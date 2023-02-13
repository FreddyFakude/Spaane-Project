<?php


namespace App\Notifications;


use Illuminate\Notifications\Notification;

class WhatsAppChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, WhatsAppUpdateToUserNotification $notification)
    {
        $message = $notification->toWhatsapp($notifiable);

        // Send notification to the $notifiable instance...
    }
}
