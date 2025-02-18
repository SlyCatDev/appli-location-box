<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use Illuminate\Support\Facades\Auth;
use App\Models\Contract;
use Carbon\Carbon;

Carbon::setLocale('fr');

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
        // On récupère la date d'aujourd'hui
        $today = Carbon::today()->toDateString();

        // Récupérer les contrats en cours qui n'ont pas encore de facture
        $contracts = Contract::where('date_start', '<=', $today)
                         ->where('date_end', '>=', $today)
                         ->whereDoesntHave('bills')
                         ->get();

        foreach ($contracts as $contract) {
            
            $startDate = Carbon::parse($contract->date_start);
            $periodNumber = $startDate->diffInMonths($today) + 1;

            $bill = new Bill();
            $bill->paiement_montant = $request->paiement_montant;
            $bill->payment_date = $request->payment_date;
            $bill->period_number = $periodNumber;
            $bill->contract_id = $contract->id;
            $bill->save();
        }
        
        return redirect()->route('bills.index')
            ->with('success', 'Bill created successfully.');
    }
}
