<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\CompanyRemunerationContribution;
use App\Models\RemunerationList;
use Illuminate\Http\Request;

class CompanyRemunerationContributionController extends Controller
{
    public function index()
    {

        return view('dashboard.company.remuneration_contribution.index', [
            'companyRemunerationContributions' => auth()->user()->company->remunerationContributions,
            'remunerations' => RemunerationList::all(),
            'companyRemunerations' => auth()->user()->company->remunerations,
        ]);
    }

    public function store(Request $request)
    {
       $validated =  $request->validate([
            'contribution_name' => 'required',
            'contribution_percentage' => 'required|numeric',
        ]);

//        insert new remuneration contribution
        $companyContribution = CompanyRemunerationContribution::create([
            'company_id' => auth()->user()->company->id,
            'name' => $validated['contribution_name'],
            'percentage' => $validated['contribution_percentage'],
            'hash' => sha1(time()),
        ]);

        return back()->with('success', 'Remuneration Contribution Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  CompanyRemunerationContribution $contribution
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(CompanyRemunerationContribution $contribution)
    {
        $contribution->delete();

        return back()->with('success', 'Remuneration Contribution Deleted');
    }

    public function updateStatus(CompanyRemunerationContribution $companyRemunerationContribution, $status='active')
    {
        $companyRemunerationContribution->update([
            'is_active' => $status == 'active' ? true : false
        ]);

        return back()->with('success', 'Remuneration Contribution Updated');
    }

}
