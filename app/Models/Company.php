<?php

namespace App\Models;

use App\Http\Controllers\Company\CompanyEmployeeEarningTypeController;
use Database\Seeders\CompanyRemunerationListSeeder;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
        return $this->hasOne(CompanyAccountAdministrator::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, 'company_id');
    }

    public function bulkMessages()
    {
        return $this->hasMany(QueuedMessage::class, 'company_id');
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
        return $this->hasMany(CompanyRemuneration::class);
    }

    public function deductions()
    {
        return $this->hasMany(CompanyRemunerationDeduction::class);
    }

    public function employeeEarningTypes()
    {
        return $this->hasMany(CompanyRemuneration::class);
    }

    public function phoneNumber(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => str_replace("27", "0", $value),
        );
    }
}
