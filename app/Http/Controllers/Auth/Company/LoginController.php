<?php

namespace App\Http\Controllers\Auth\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware("web")->except("logout");
    }

    public function loginForm(){
        return view("auth.company.login");
    }

    public function login(Request $request){

        $validated =  $request->validate([
            "email"=>"required",
            "password"=>"required"
        ]);

        if (Auth::guard("company")->attempt($validated)){
            return redirect()->route("dashboard.company.index");
        }
        session()->flash('failed');
        return redirect()->back();
    }

    public function logout(){
        auth()->guard("company")->logout();
        return redirect()->route('company.login.form');
    }
}
