<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyLeaveSetting extends Model
{
    use HasFactory;

    public function leaveType()
    {
        return $this->belongsTo(CompanyLeaveType::class, 'company_leave_type_id');
    }
}
