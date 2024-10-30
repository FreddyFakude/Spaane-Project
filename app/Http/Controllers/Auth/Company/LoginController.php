<?php

namespace App\Http\Controllers\Auth\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest:company'])->except("logout");
    }

    public function loginForm()
    {
        return view("auth.company.login");
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required'
        ], [
            'email.email' => 'Invalid email address'
        ]);

        if (Auth::guard('company')->attempt($validated)) {
            return redirect()->route('dashboard.company.index');
        } else {
            return back()->withErrors([
                'login_error' => 'Invalid Username or Password',
            ])->onlyInput('email');
        }
    }

    public function logout()
    {
        auth()->guard("company")->logout();
        return redirect()->route('company.login.form');
    }
}
