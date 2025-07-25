<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function store(Request $request)
    {
      
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'industry' => 'required|string',
        ]);

        $company = Auth::user()->companies()->create($validated);

        return response()->json(['message' => 'Company created', 'company' => $company]);
    }

    public function index()
    {
       
        $companies = Auth::user()->companies()->get();
        return response()->json($companies);
    }

    public function update(Request $request, $id)
    {
        $company = Auth::user()->companies()->findOrFail($id);

        $company->update($request->only(['name', 'address', 'industry']));
        return response()->json(['message' => 'Company updated', 'company' => $company]);
    }

    public function destroy($id)
    {
        $company = Auth::user()->companies()->findOrFail($id);
        $company->delete();
        return response()->json(['message' => 'Company deleted']);
    }

    public function switch($id)
    {
        $company = Auth::user()->companies()->findOrFail($id);
        $user = Auth::user()->update(['active_company_id' => $company->id]);

        return response()->json(['message' => 'Active company switched', 'company' => $company]);
    }

}
