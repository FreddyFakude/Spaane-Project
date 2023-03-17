<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeavePolicy extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class, 'leave_type_id');
    }

    public function initialDay()
    {
        return $this->hasOne(EmployeeLeaveInitialCurrentDay::class, 'leave_policy_id');
    }
}
