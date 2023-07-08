<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\CompanyPayslip;
use App\Models\Employee;
use App\Services\Payslip;
use App\Services\PDF\PayslipPDFGenerator;
use App\Services\TaxCalculations\PAYECalculator;
use App\Services\TaxCalculations\UIFCalculator;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Request;


class CompanyPayslipController extends Controller
{
    public function index()
    {

        return view('dashboard.company.payroll.months', [
            'payslips' => auth()->user()->company->payslips()->with('employee')->get(),
            'employees' => auth()->user()->company->employees()->get(),
        ]);
    }

    public function store(Request $request, Employee $employee)
    {

       $validated =  $request->validate([
            'earnings.*' => 'required|numeric',
            'other_earnings.*' => 'nullable|numeric',
            'deductions.*' => 'nullable|numeric',
            'contributions.*' => 'nullable|numeric',
            'date' => 'required|date|date_format:Y-m-d',
        ]);

        $payslip = (new Payslip(auth()->user()->company))->create($employee, $validated);
        return redirect()->route('dashboard.business.payroll.index')->with('payslip-added', 'Payslip created successfully');
    }


    public function show($date)
    {
        return view('dashboard.company.payroll.employee', [
            'date' => $date,
            'employees' => auth()->user()->company->employees->load('payslips', 'remunerations', 'otherEarnings', 'otherDeductions'),
        ]);
    }

    public function createAll(Request $request)
    {
        $validated =  $request->validate([
            'date' => 'required|date|date_format:Y-m-d',
        ]);
        $date = Carbon::createFromFormat('Y-m-d', $validated['date']);
        $employees = Employee::where('company_id', auth()->user()->company->id)->get();
        foreach ($employees as $employee){
            if ($employee->payslips()->where('month_year', $date->format('Y-m'))->count() == 0 && $employee->remuneration->basic_salary > 0 && $employee->remuneration->travel_allowance > 0){
                $payslip = $employee->payslips()->create([
                    'basic_salary' => $employee->remuneration->basic_salary,
                    'commission' => $employee->remuneration->commission ?? 0,
                    'travel_allowance' => $employee->remuneration->travel_allowance,
                    'reimbursement' => $employee->remuneration->reimbursement ?? 0,
                    'other' => $employee->other ?? 0,
                    'date' =>  $date->format('Y-m-d'),
                    'reference_number' => 'PAYS-'. auth()->user()->company->payslips()->count() + 1,
                    'file_name' => 'PAYS-'. auth()->user()->company->payslips()->count() + 1,
                    'hash' => sha1(auth()->user()->company->payslips()->count() + 1),
                    'company_id' => auth()->user()->company->id,
                    'month_year' =>  $date->format('Y-m'),
                ]);
            }
        }

        return back()->with('payslip-added', 'Payslip created successfully');
    }

    public function downloadPayslip(Employee $employee, CompanyPayslip $payslip)
    {
        if (!$employee->bankAccount){
            return back()->with('error', 'Employee does not have a bank account');
        }
        return (new PayslipPDFGenerator())->downloadPDF($employee, $payslip, true);
    }
}
