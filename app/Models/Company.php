<?php

namespace App\Models;

use Database\Seeders\CompanyRemunerationListSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];
    public const STATUS = [1=>"TEMPORARY", 2=>"COMPLETE"];
    public const size = [
        1 => 'MICRO',
        2 => 'SMALL',
        3 => 'MEDIUM',
        4 => 'LARGE',
    ];
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

    public function companyLeavePolicy()
    {
        return $this->hasMany(LeaveType::class);
    }

    public function remunerationContributions()
    {
        return $this->hasMany(CompanyRemunerationContribution::class);
    }

    public function remunerations()
    {
        return $this->hasMany(CompanyRemunerationList::class);
    }
}
