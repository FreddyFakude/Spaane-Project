<?php

namespace App\Services\TaxCalculations;

use App\Models\Employee;

class UIFCalculator {
    private $salary;

    public function __construct(Employee $employee) {
        $this->salary = $employee->remuneration?->basic_salary ?? 0;
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
