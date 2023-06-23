<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QueuedMessage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public const STATUS = ['active'=>"ACTIVE", 'lapsed'=>"LAPSED", 'preview'=>'PREVIEW'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
