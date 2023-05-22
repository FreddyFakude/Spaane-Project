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
    public const ContractType = ["Permanent", "Temporary", "Internship", "Part-time", "Learnership", "Fixed-term", "Independent contractor"];

    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function payslips()
    {
        return $this->hasMany(CompanyPayslip::class);
    }

    public function address(){
        return $this->morphOne(Address::class, 'addressable');
    }


    public function department(){
        return $this->belongsTo(CompanyDepartment::class, 'company_department_id');
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

    public function initialLeaveTypeDays()
    {
        return $this->hasMany(EmployeeLeaveInitialCurrentDay::class);
    }


    public function leaveRequests()
    {
        return $this->hasMany(EmployeeLeaveRequest::class);
    }

    public function leaveRequestApproved()
    {
        return $this->hasMany(EmployeeLeaveRequest::class)->where('status', 'APPROVED');
    }

    public function leavePolicies()
    {
        return $this->hasMany(EmployeeLeavePolicy::class, 'employee_id');
    }

    public function bulkMessages()
    {
        return $this->hasMany(EmployeeBulkMessage::class, 'employee_id');
    }

    public function bankAccount()
    {
        return $this->morphOne(BankAccount::class, 'bank_accountable');
    }

    public function remunerations()
    {
        return $this->hasMany(EmployeeRemuneration::class, 'employee_id');
    }


    public function otherEarnings()
    {
        return $this->hasMany(EmployeeOtherEarning::class, 'employee_id');
    }
}
