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
        // Valide que le nom et le delta JSON sont présents
        $request->validate([
            'name'    => 'required|string|max:255',
            'content' => 'required|string', // Attendu en JSON
        ]);

        $contractModel = new ContractModel();
        $contractModel->name    = $request->name;
        $contractModel->content = $request->content;
        $contractModel->user_id = auth()->id();
        $contractModel->save();

        return redirect()->route('contract_models.index')
            ->with('success', 'Model created successfully');
    }

    public function show(ContractModel $contractModel)
    {
        return view('contract_models.show', ['contractModel' => $contractModel]);
    }

    public function edit(ContractModel $contractModel)
    {
        return view('contract_models.edit', ['contractModel' => $contractModel]);
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
