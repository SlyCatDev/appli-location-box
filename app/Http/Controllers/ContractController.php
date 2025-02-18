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
        $contractModels = ContractModel::all();
        return view('contracts.create', compact('boxes', 'tenants', 'users', 'contractModels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'contractModel_id' => 'required|exists:contract_models,id',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after:date_start',
            'monthly_price' => 'required|numeric|min:0',
            'box_id' => 'required|exists:boxes,id',
            'tenant_id' => 'required|exists:tenants,id',
        ]);
        $contractModel = ContractModel::findOrFail($request->contractModel_id);

        // Remplacement des variables dans le modèle
        $content = $this->replaceVariables($contractModel->content, [
            'nom' => $request->tenant_name ?? 'Nom inconnu',
            'date_signature' => now()->format('d/m/Y'),
            'montant' => $request->monthly_price,
            'date_debut' => $request->date_start,
            'date_fin' => $request->date_end,
        ]);

        $contract = new Contract([
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'monthly_price' => $request->monthly_price,
            'box_id' => $request->box_id,
            'tenant_id' => $request->tenant_id,
            'user_id' => Auth::id(),
        ]);
        $contract->save();

        return redirect()->route('contracts.index')
            ->with('success', 'Contrat créé avec succès.');
    }

    public function show($id)
    {
        $contract = Contract::findOrFail($id);
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
            'contractModel_id' => 'required|exists:contract_models,id',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after:date_start',
            'monthly_price' => 'required|numeric|min:0',
            'box_id' => 'required|exists:boxes,id',
            'tenant_id' => 'required|exists:tenants,id',
        ]);

        $contract->update($request->only(['date_start', 'date_end', 'monthly_price', 'box_id', 'tenant_id']));

        return redirect()->route('contracts.index')
            ->with('success', 'Contrat mis à jour avec succès.');
    }

    public function destroy(Contract $contract)
    {
        $contract->delete();

        return redirect()->route('contracts.index')
            ->with('success', 'Contrat supprimé avec succès.');
    }

    /**
     * Remplace les variables dynamiques dans un texte donné.
     *
     * @param string $template Le modèle de texte avec des variables {variable}
     * @param array $data Tableau associatif des valeurs à remplacer
     * @return string
     */
    private function replaceVariables(string $template, array $data): string
    {
        foreach ($data as $key => $value) {
            $template = str_replace("{" . $key . "}", $value, $template);
        }
        return $template;
    }
}