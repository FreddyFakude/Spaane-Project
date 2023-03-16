<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class EmployeeLeaveTypeInitialDay extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope('valid_days', function (Builder $builder) {
            $builder->where('expiry_date', '<', now()->addYear());
        });
    }
    public const MAX_LEAVE_DAYS = 10;
    public function leaveRequest()
    {
        return $this->hasMany(EmployeeLeaveRequest::class);
    }
}
