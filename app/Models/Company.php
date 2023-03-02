<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function administrator()
    {
        return $this->hasOne(CompanyAccountAdministrator::class, '');
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, 'company_id');
    }

    public function bulkMessages()
    {
        return $this->hasMany(BulkMessage::class, 'company_id');
    }

    public function payslips()
    {
        return $this->hasMany(CompanyPayslip::class);
    }
}
