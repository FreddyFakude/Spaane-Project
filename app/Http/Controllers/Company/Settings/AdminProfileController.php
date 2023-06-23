<?php

namespace App\Http\Controllers\Company\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.company.settings.admin-profile',[
            'company' => auth()->guard('company')->user()->company,
            'admin' => auth()->guard('company')->user()
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'nullable|string|max:255',
        ]);

        $user = auth()->guard('company')->user()->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'gender'=> $validated['gender'],
            'dob' => $validated['dob'],
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
