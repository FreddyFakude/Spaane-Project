<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeBulkMessage extends Model
{
    use HasFactory;

    protected $guarded = [];
    public const STATUS = ['delivered'=>"DELIVERED", 'sent'=>"SENT", 'failed'=>"FAILED", 'pending'=>"PENDING"];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * Scope a query to only pending messages.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePending($query)
    {
        return $query->where('status', self::STATUS['pending']);
    }

    public function message()
    {
     return   $this->belongsTo(BulkMessage::class, 'bulk_message_id');
    }
}
