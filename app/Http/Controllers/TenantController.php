<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    
    public function index()
    {
        $tenants = Tenant::all();
        return view('tenants.index', ['tenants' => $tenants]);
    }

    public function create()
    {
        return view('tenants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:tenants',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'bank_account' => 'required|string'
        ]);

        $tenant = new Tenant($request->all());
        $tenant->save();

        return redirect()->route('tenants.index')
            ->with('success', 'Tenant created successfully.');
    }

    public function show(Tenant $tenant)
    {
        return view('tenants.show', ['tenant' => $tenant]);
    }

    public function edit(Tenant $tenant)
    {
        return view('tenants.edit', ['tenant' => $tenant]);
    }

    public function update(Request $request, Tenant $tenant)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'bank_account' => 'required|string'
        ]);

        // dd('test');

        $tenant->name = $request->name;
        $tenant->email = $request->email;
        $tenant->phone = $request->phone;
        $tenant->address = $request->address;
        $tenant->bank_account = $request->bank_account;
        
        $tenant->save();

        return redirect()->route('tenants.index')
            ->with('success', 'Tenant updated successfully');
    }

    public function destroy(Tenant $tenant)
    {
        $tenant->delete();

        return redirect()->route('tenants.index')
            ->with('success', 'Tenant deleted successfully');
    }
}