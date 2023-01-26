<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public const STATUS = ['guest'=>"GUESTUSER", 'invite_sent'=>"INVITE SENT"];

    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }
}
