<?php

namespace App\Services;

use App\Models\Company;
use App\Models\Employee;
use App\Models\EmployeeRemuneration;
use App\Models\EmployeeRemunerationDeduction;
use Carbon\Carbon;

class Payslip
{
//    private $company;
    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    public function create(Employee $employee, Array $data)
    {
        $data['deductions'] = isset($data['deductions']) ?  $this->processDeductions($data['deductions']): '';
        $data['earnings'] = isset($data['earnings']) ?  $this->processEarnings($data['earnings']): '';
        $data['other_earnings'] = isset($data['other_earnings']) ?  $this->processOtherEarnings($data['other_earnings']): '';
        $data['contributions'] = $this->processContributions();
        $data['reference_number'] = 'PAYS-'.$this->company->payslips()->count()  .  "-" .  time();
        $data['file_name'] = 'PAYS-'. $this->company->payslips()->count() .  "-" .  time();
        $data['hash'] = sha1($this->company->payslips()->count() .  "-" .  time());
        $data['company_id'] = $this->company->id;
        $data['month_year'] = Carbon::createFromFormat('Y-m-d', $data['date'])->format('Y-m');

       return $employee->payslips()->create($data);
    }

    private function processDeductions(Array $deductions)
    {
        $newArray = [];
        foreach ($deductions as $deduction=>$value){
           if($employeeDeduction = EmployeeRemunerationDeduction::find($deduction)){
               $newArray[$employeeDeduction->name] = ['amount' => $value];
           }
        }
        return $newArray;
    }

    private function processEarnings(Array $earnings)
    {
        $newArray = [];
        foreach ($earnings as $earning=>$value){
            if($employeeEarning = EmployeeRemuneration::find($earning)){
                $newArray[$employeeEarning->name] = ['amount' => $value];
            }
        }
        return $newArray;
    }

    private function processOtherEarnings(Array $otherEarnings)
    {
        $newArray = [];
        foreach ($otherEarnings as $earning=>$value){
            $newArray[$earning] = ['amount' => $value];
        }
        return $newArray;
    }

    private function processContributions()
    {
        $newArray = [];
        foreach ($this->company->remunerationContributions as $contribution){
            $newArray[$contribution->name] = ['percentage' => $contribution->percentage];
        }

        return [$newArray];
    }
}
