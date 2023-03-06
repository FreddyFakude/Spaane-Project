<?php


namespace App\Repository;


use App\Models\Chat;
use App\Models\Employee;
use App\Models\User;
use App\Models\WhatsAppTemplateMessage;
use Illuminate\Support\Facades\Hash;


class WhatsAppTemplateMessageRepository
{


    /**
     *
     * Get template message by slug
     *
     * @param string $slug
     * @return WhatsAppTemplateMessage
     */
    public function getMessageBySlug(string $slug): WhatsAppTemplateMessage
    {
        return  WhatsAppTemplateMessage::firstWhere([
            'slug' => $slug
        ]);
    }

}
