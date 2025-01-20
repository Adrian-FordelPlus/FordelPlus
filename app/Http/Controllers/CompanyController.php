<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return response()->json(Company::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'cvr' => 'required|string|unique:companies,cvr',
            'b2b' => 'boolean',
            'b2c' => 'boolean',
            'type_id' => 'required|exists:types,id',
            'is_company' => 'boolean',
            'branch_code' => 'nullable|string|max:50',
        ]);

        $company = Company::create($validated);

        return response()->json($company, 201);
    }

    public function show(Company $company)
    {
        return response()->json($company);
    }

    public function update(Request $request, Company $company)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'address' => 'nullable|string|max:255',
            'cvr' => 'sometimes|string|unique:companies,cvr,' . $company->id,
            'b2b' => 'boolean',
            'b2c' => 'boolean',
            'type_id' => 'sometimes|exists:types,id',
            'is_company' => 'boolean',
            'branch_code' => 'nullable|string|max:50',
        ]);

        $company->update($validated);

        return response()->json($company);
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return response()->json(null, 204);
    }
}
