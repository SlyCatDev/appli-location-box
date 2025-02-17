<?php

namespace App\Http\Controllers;

use App\Models\ContractModel;
use Illuminate\Http\Request;

class ContractModelController extends Controller
{
    public function index()
    {
        $contractModels = ContractModel::all();
        return view('contract_models.index', compact('contractModels'));
    }

    public function create()
    {
        return view('contract_models.create');
    }

    public function store(Request $request)
    {
        $data = $request->input('blocks');

        // Sauvegarder les données JSON dans la base de données
        $contractModel = new ContractModel();
        $contractModel->name    = $request->name;
        $contractModel->content = json_encode($data);
        $contractModel->user_id = auth()->id();
        $contractModel->save();

        return redirect()->route('contract_models.index')
            ->with('success', 'Model created successfully');
    }

    public function show(ContractModel $contractModel, array $replacements)
    {
        $content = $contractModel->content;

        // Remplacer les variables par les valeurs réelles
        foreach ($replacements as $key => $value) {
            $content = str_replace("{{ $key }}", $value, $content);
        }

        // Retourner le contenu du contrat généré
        return view('contracts.show', ['content' => $content]);
    }

    public function edit(ContractModel $contractModel)
    {
        return view('contract_models.edit', ['contract_model' => $contractModel]);
    }

    public function update(Request $request, ContractModel $contractModel)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $contractModel->name    = $request->name;
        $contractModel->content = $request->content;
        $contractModel->save();

        return redirect()->route('contract_models.index')
            ->with('success', 'Model updated successfully');
    }

    public function destroy(ContractModel $contractModel)
    {
        $contractModel->delete();

        return redirect()->route('contract_models.index')
            ->with('success', 'Model deleted successfully');
    }
}