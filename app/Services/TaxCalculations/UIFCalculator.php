<?php

namespace App\Services\TaxCalculations;

use App\Models\Employee;
use App\Services\EmployeeRemunerationAndDeductionService;

class UIFCalculator {
    private $salary;

    public function __construct(Employee $employee) {
        $this->salary =  (new EmployeeRemunerationAndDeductionService())->totalEarnings($employee);;
    }

    public function calculateUIF() {
        $maxEarnings = 17808;
        $uifRate = 0.01;
        $uifCap = $maxEarnings * $uifRate;

        if ($this->salary > $maxEarnings) {
            return $uifCap;
        } else {
            return $this->salary * $uifRate;
        }
    }
}
