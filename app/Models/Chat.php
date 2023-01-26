<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $guarded = [];

    public const STATUS = ['opened'=>"OPENED", 'closed'=>"CLOSED", "awaiting_user_reply"=>"AWAITING  USER REPLY", "awaiting_company_reply"=>"AWAITING COMPANY REPLY"];

    public function chatable()
    {
        return $this->morphTo();
    }

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }

    public function messages(){
        return $this->hasMany(Message::class, 'chat_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}
