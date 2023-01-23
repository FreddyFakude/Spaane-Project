<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyEmployeeChat extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function chats()
    {
        return $this->hasMany(CompanyEmployeeChat::class);
    }

    public function messages(){
        return $this->hasMany(Message::class, 'chat_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}
