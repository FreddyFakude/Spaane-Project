<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;

class CompanyPayslipController extends Controller
{
    public function index()
    {
        return view('company.payslip.index', [
            'payslips' => auth()->user()->company->payslips()->paginate(10),
        ]);
    }
}
