<?php

namespace App\Http\Middleware;

use App\Models\Company;
use Closure;
use Illuminate\Http\Request;

class EnsureCompanyProfileIsComplete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->guard('company')->user()) {
            if (auth()->guard('company')->user()->company->status == Company::STATUS[2]) {
                return $next($request);
            }
            return redirect()->route('dashboard.company.profile');
        }

        return redirect()->route('company.register.form');
    }
}
