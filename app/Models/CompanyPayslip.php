<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CompanyPayslip extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'earnings' => 'array',
        'deductions' => 'array',
        'contributions' => 'array',
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
