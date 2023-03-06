<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeaveDay extends Model
{
    use HasFactory;

    protected $guarded = [];

    public const MAX_LEAVE_DAYS = 10;
    public function leaves()
    {
        return $this->hasMany(EmployeeLeave::class);
    }
}
