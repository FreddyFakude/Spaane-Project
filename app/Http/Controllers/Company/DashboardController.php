<?php


namespace App\Http\Controllers\Company;


use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class DashboardController
{
    public function index(){
        $talents = Employee::where('is_profile_complete', '=', false)->get();
        return view('dashboard.company.index', [
            "talents"=>$talents,
            "businessId" =>  Auth::id()
        ]);
    }
}
