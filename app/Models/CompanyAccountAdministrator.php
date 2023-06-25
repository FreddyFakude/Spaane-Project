<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyAccountAdministrator extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function employees()
    {
        return $this->hasManyThrough(Employee::class, Company::class, 'id');
    }

    public function chats()
    {
        return $this->hasManyThrough(Chat::class, Company::class, 'id');
    }

    public function bulkMessages()
    {
        return $this->hasManyThrough(QueuedMessage::class, Company::class, 'id');
    }
}
