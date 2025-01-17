<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;


    protected $guarded = [];
    /**
     * Get the parent messageable model.
     */
    public function messageable()
    {
        return $this->morphTo();
    }
}
