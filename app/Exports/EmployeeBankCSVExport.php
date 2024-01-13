<?php

namespace App\Exports;

use App\Models\Employee;
use Vitorccs\LaravelCsv\Concerns\Exportable;
use Vitorccs\LaravelCsv\Concerns\FromCollection;
use Vitorccs\LaravelCsv\Concerns\WithHeadings;
use Vitorccs\LaravelCsv\Concerns\WithMapping;

class EmployeeBankCSVExport implements FromCollection, WithHeadings, WithMapping
{
    use Exportable;

    public function headings(): array
    {
        return ['ID Number', 'Company', 'Full names', 'Surname and Initial', 'Account number', 'Account type', 'Bank name', 'Branch code'];
    }
    public function collection()
    {
        return Employee::with('bankAccount')->where('company_id', '=', \Auth::user()->company->id)->get();
    }

    public function map($employee): array
    {
        $company = \Auth::user()->company->name;
        return [
            $employee->id_or_passport,
            $company,
            $employee->first_name . ' ' .  $employee->last_name,
            $employee->last_name . ' ' . substr($employee->first_name, 0, 1),
            $employee->bankAccount?->account_number,
            $employee->bankAccount?->account_type,
            $employee->bankAccount?->bank_name,
            $employee->bankAccount?->branch_code,
        ];
    }
}
