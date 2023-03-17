<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeaveRequest extends Model
{
    use HasFactory;

    protected $guarded = [];
    public const STATUS = ['review'=>"REVIEW", 'approved'=>"APPROVED", 'denied'=> "DENIED", 'pending'=>"PENDING"];

    public function initialDay()
    {
        return $this->belongsTo(EmployeeLeaveInitialCurrentDay::class, 'leave_initial_day_id');
    }

}
