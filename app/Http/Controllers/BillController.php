<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use Illuminate\Support\Facades\Auth;
use App\Models\Contract;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::whereHas('contract', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();

        return view('bills.index', ['bills' => $bills]);
    }

    public function create()
    {
        $contracts = Contract::all();
        return view('bills.create', compact('contracts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'paiement_montant' => 'required|numeric',
            'payment_date' => 'required|date',
            'period_number' => 'required|integer',
            'contract_id' => 'required|exists:contracts,id',
        ]);

        $bill = new Bill($request->all());
        $bill->contract_id = $request->contract_id;
        $bill->save();

        return redirect()->route('bills.index')
            ->with('success', 'Bill created successfully.');
    }

    public function destroy(Bill $bill)
    {
        $bill->delete();

        return redirect()->route('bills.index')
            ->with('success', 'Bill deleted successfully.');
    }
}
