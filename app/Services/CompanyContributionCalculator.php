<?php

namespace App\Services;

use App\Models\CompanyRemunerationContribution;
use App\Models\Employee;
use App\Services\TaxCalculations\UIFCalculator;

class CompanyContributionCalculator
{
    public function calculatorContribution(Employee $employee,CompanyRemunerationContribution $companyRemunerationContribution)
    {
    	 $totalRemuneration = (new EmployeeRemunerationAndDeductionService())->totalEarnings($employee);
        if (strtolower($companyRemunerationContribution->name) == 'uif'){
            return $this->calculateUif($employee);
        }
        return $totalRemuneration * $companyRemunerationContribution->percentage/100;
    }

    public function calculateUif(Employee $employee)
    {
       return (new UIFCalculator($employee))->calculateUIF();
    }
}
