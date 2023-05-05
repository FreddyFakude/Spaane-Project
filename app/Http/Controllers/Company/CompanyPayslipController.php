<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\CompanyPayslip;
use App\Models\Employee;
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
            'basic_salary' => 'required|integer',
            'commission' => 'required|integer',
            'travel_allowance' => 'required|integer',
            'reimbursement' => 'required|integer',
            'other' => 'nullable|integer',
            'date' => 'required|date',
        ]);
       $validated['reference_number'] = 'PAYS-'. auth()->user()->company->payslips()->count() + 1;
       $validated['file_name'] = 'PAYS-'. auth()->user()->company->payslips()->count() + 1;
       $validated['hash'] = sha1(auth()->user()->company->payslips()->count() + 1);
       $validated['company_id'] = auth()->user()->company->id;
       $validated['month_year'] = Carbon::createFromFormat('Y-m-d', $validated['date'])->format('Y-m');
        $payslip = $employee->payslips()->create($validated);
        return redirect()->route('dashboard.business.payroll.index')->with('payslip-added', 'Payslip created successfully');
    }


    public function show($date)
    {
        return view('dashboard.company.payroll.employee', [
            'date' => $date,
            'employees' => Employee::where('company_id', auth()->user()->company->id)->with('payslips')->get(),
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
        return (new PayslipPDFGenerator())->downloadPDF($employee, $payslip);
    }
}
