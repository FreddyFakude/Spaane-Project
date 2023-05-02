<?php

namespace App\Services\TaxCalculations;

use App\Models\Employee;

class PAYECalculator {
    private $salary;

    public function __construct(Employee $employee) {
        $this->salary = $employee->remuneration?->basic_salary ?? 0;
    }

    public function calculatePaye() {
        $annualSalary = $this->salary * 12;
        $taxableIncome = $annualSalary - 79000;

        if ($taxableIncome <= 0) {
            return 0;
        }

        $taxDue = 0;

        if ($taxableIncome <= 195850) {
            $taxDue = $taxableIncome * 0.18;
        } elseif ($taxableIncome <= 305850) {
            $taxDue = 35253 + (($taxableIncome - 195850) * 0.26);
        } elseif ($taxableIncome <= 423300) {
            $taxDue = 63853 + (($taxableIncome - 305850) * 0.31);
        } elseif ($taxableIncome <= 555600) {
            $taxDue = 100263 + (($taxableIncome - 423300) * 0.36);
        } elseif ($taxableIncome <= 708310) {
            $taxDue = 147891 + (($taxableIncome - 555600) * 0.39);
        } else {
            $taxDue = 207448 + (($taxableIncome - 708310) * 0.41);
        }

        return round($taxDue / 12);
    }
}

