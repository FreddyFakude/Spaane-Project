<?php

namespace App\Exports;

use App\Models\Employee;
use App\Services\EmployeeRemunerationAndDeductionService;
use Vitorccs\LaravelCsv\Concerns\Exportable;
use Vitorccs\LaravelCsv\Concerns\FromCollection;
use Vitorccs\LaravelCsv\Concerns\WithHeadings;
use Vitorccs\LaravelCsv\Concerns\WithMapping;

class EmployeeBankCSVExport implements FromCollection, WithHeadings, WithMapping
{
    use Exportable;



    public function __construct($employees)
    {
        $this->employees = $employees;
    }

    public function headings(): array
    {
        return ['ID Number', 'Company', 'Full names', 'Surname and Initial', "Amount",'Account number', 'Account type', 'Bank name', 'Branch code'];
    }
    public function collection()
    {
        return $this->employees;
    }

    public function map($employee): array
    {
        $company = \Auth::user()->company->name;
        return [
            $employee->id_or_passport,
            $company,
            $employee->first_name . ' ' .  $employee->last_name,
            $employee->last_name . ' ' . substr($employee->first_name, 0, 1),
            (new EmployeeRemunerationAndDeductionService)->netPay($employee),
            $employee->bankAccount?->account_number,
            $employee->bankAccount?->account_type,
            $employee->bankAccount?->bank_name,
            $employee->bankAccount?->branch_code,
        ];
    }
}
