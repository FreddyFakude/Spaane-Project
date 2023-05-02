<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeRemuneration extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function deductions()
    {
        return $this->hasMany(EmployeeRemunerationDeduction::class, 'remuneration_id');
    }
}
