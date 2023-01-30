<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee  extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];

    public const STATUS = ['guest'=>"GUESTUSER", 'invite_sent'=>"INVITE SENT"];

    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function payslips()
    {
        return $this->hasMany(Payslip::class);
    }

    public function address(){
        return $this->morphOne(Address::class, 'addressable');
    }

    public function education(){
        return $this->morphOne(Education::class, 'educationable');
    }


    public function professional_experience(){
        return $this->morphOne(ProfessionalExperience::class, 'professional_experienceable');
    }

    public function skills(){
        return $this->belongsToMany(Skill::class, 'employee_skills');
    }

    public function chats()
    {
        return $this->morphMany(Chat::class, 'chatable');
    }

}
