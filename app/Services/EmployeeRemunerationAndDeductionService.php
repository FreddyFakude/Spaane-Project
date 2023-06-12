<?php

namespace App\Services;

use App\Models\Company;
use App\Models\CompanyRemuneration;
use App\Models\CompanyRemunerationDeduction;
use App\Models\Employee;

class EmployeeRemunerationAndDeductionService
{

    public function __construct()
    {
    }

    public function processNewEmployee(Company $company, Employee $employee)
    {
        foreach ($company->remunerations as $remuneration){
            $this->addRemunerationToEmployee($remuneration, $employee);
        }
        foreach ($company->deductions as $deduction){
            $this->addDeductionToEmployee($deduction, $employee);
        }

        return true;
    }
    public function addRemunerationToEmployee(CompanyRemuneration $companyRemuneration, Employee $employee)
    {
        $employee->remunerations()->create([
            'name' => $companyRemuneration->name,
            'company_remuneration_id' => $companyRemuneration->id,
            'amount' => 0
        ]);

        return true;
    }

    public function addDeductionToEmployee(CompanyRemunerationDeduction $companyRemunerationDeduction, Employee $employee)
    {
            $employee->deductions()->create([
                'name' => $companyRemunerationDeduction->name,
                'company_id' => $companyRemunerationDeduction->id,
                'amount' => $companyRemunerationDeduction->amount,
                'type' => $companyRemunerationDeduction->type
            ]);

        return true;
    }
}
