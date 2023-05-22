<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemunerationList extends Model
{
    use HasFactory;

    public const Scope = ["global" => "GLOBAL", "restricted" => "RESTRICTED"];
}
