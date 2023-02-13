<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employee  extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    protected $appends = ['current_leave_days'];
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

    public function leaveDays()
    {
        return $this->hasMany(EmployeeLeaveDay::class);
    }


    public function leaves()
    {
        return $this->hasMany(EmployeeLeave::class);
    }

    public function currentLeaveDays(): Attribute
    {
        $leaveDays = $this->leaveDays()->get();
        return Attribute::make(
            get: fn() => intval($leaveDays->last()->days) -  $leaveDays->last()->leaves->where('status','APPROVED')->sum('requested_days')
        );
    }


}
