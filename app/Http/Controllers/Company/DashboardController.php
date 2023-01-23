<?php


namespace App\Http\Controllers\Business;


use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class DashboardController
{
    public function index(){
        $talents = Employee::where('is_profile_complete', '=', true)->get();
        return view('dashboard.business.index', [
            "talents"=>$talents,
            "businessId" =>  Auth::user()->business->id
        ]);
    }
}
