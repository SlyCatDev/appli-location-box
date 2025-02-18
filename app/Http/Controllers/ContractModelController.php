<?php

namespace App\Http\Controllers;

use App\Models\ContractModel;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tenant;
use App\Models\Box;
use App\Models\User;
use App\Models\Bill;

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
        $request->validate([
            'name'    => 'required|string|max:255',
            'content' => 'required|string',
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
        $contractModel->user_id = auth()->id();
        $contractModel->save();

        return redirect()->route('contract_models.index')
            ->with('success', 'Model updated successfully');
    }

    public function destroy(ContractModel $contractModel)
    {
        if ($contractModel->contracts()->count() > 0) {
            return redirect()->route('contract_models.index')
                ->with('error', 'Impossible de supprimer ce modèle car il est utilisé par des contrats.');
        }
        $contractModel->delete();

        return redirect()->route('contract_models.index')
            ->with('success', 'Model deleted successfully');
    }
}