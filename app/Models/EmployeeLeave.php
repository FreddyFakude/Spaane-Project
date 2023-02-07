<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeave extends Model
{
    use HasFactory;

    protected $guarded = [];
    public const STATUS = ['review'=>"REVIEW", 'approved'=>"APPROVED", 'denied'=> "DENIED"];

}
