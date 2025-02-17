<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\ContractModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContractController extends Controller
{
    public function index()
    {
        $contracts = Contract::all();
        return view('contracts.index', ['contracts' => $contracts]);
    }

    public function create()
    {
        $boxes = \App\Models\Box::all();
        $tenants = \App\Models\Tenant::all();
        $users = \App\Models\User::all();
        return view('contracts.create', compact('boxes', 'tenants', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'monthly_price' => 'required|numeric',
            'box_id' => 'required|exists:boxes,id',
            'tenant_id' => 'required|exists:tenants,id',
        ]);

        $contract = new Contract($request->all());
        $contract->user_id = Auth::id();
        $contract->save();

        return redirect()->route('contracts.index')
            ->with('success', 'Contract created successfully.');
    }

    public function show($id)
    {
        $contract = Contract::with('tenant')->findOrFail($id);
        return view('contracts.show', compact('contract'));
    }  

    public function edit(Contract $contract)
    {
        $boxes = \App\Models\Box::all();
        $tenants = \App\Models\Tenant::all();
        $users = \App\Models\User::all();
        return view('contracts.edit', compact('contract', 'boxes', 'tenants', 'users'));
    }

    public function update(Request $request, Contract $contract)
    {
        $request->validate([
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'monthly_price' => 'required|numeric',
            'box_id' => 'required|exists:boxes,id',
            'tenant_id' => 'required|exists:tenants,id',
        ]);

        $contract->date_start = $request->date_start;
        $contract->date_end = $request->date_end;
        $contract->monthly_price = $request->monthly_price;
        $contract->box_id = $request->box_id;
        $contract->tenant_id = $request->tenant_id;
        $contract->save();

        return redirect()->route('contracts.index')
            ->with('success', 'Contract updated successfully.');
    }

    public function destroy(Contract $contract)
    {
        $contract->delete();

        return redirect()->route('contracts.index')
            ->with('success', 'Contract deleted successfully.');
    }
}
