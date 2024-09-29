<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Traits\UploadeImageTrait;

class CompanyController extends Controller
{
    use UploadeImageTrait;

    // dispaly all companies in table
    public function index()
    {
        $companies = Company::all();
        return view('dashboard.companies.index', compact('companies'));
    }

    //display create-form
    public function create()
    {
        return view('dashboard.companies.create');
    }

    // store company data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'photo' => 'nullable|image',
            'city' => 'required|string',
            'country' => 'required|string',
        ]);

        $imagePath = $this->uploade_image($request, 'photo', 'companies');

       Company::create([
            'name' => $request->name,
            'photo' => $imagePath,
            'city' => $request->city,
            'country' => $request->country,
        ]);

        return redirect()->route('companies.index');
    }

    // disply edit-form
        public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('dashboard.companies.edit', compact('company'));
    }
    // edit form
    public function update(Request $request, Company $company)
    {
        $old_path=$company->photo;
        $imagePath=$this->uploade_image($request, 'photo', 'companies', $old_path);
        $updateData = [
            'name' => $request->name,
            'photo' => $request->photo,
            'city' => $request->city,
            'country' => $request->country,
        ];

        if ($imagePath) {
            $updateData['photo'] = $imagePath;
        }
        $company->update($updateData);
        return redirect()->route('companies.index');
    }

    // display one company
    public function show(Company $company)
    {
        return view('dashboard.companies.show', compact('company'));
    }

    //delete company
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index');
    }
}
