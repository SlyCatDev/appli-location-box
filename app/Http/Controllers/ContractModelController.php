<?php

namespace App\Http\Controllers;

use App\Models\ContractModel;
use App\Models\Contract;
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
        $contractModel->delete();

        return redirect()->route('contract_models.index')
            ->with('success', 'Model deleted successfully');
    }
    /**
     * Prépare la génération du contrat.
     * Extrait les variables du modèle (exemple : {nom}, {prenom}, {adresse})
     * et affiche un formulaire pour que l'utilisateur saisisse les valeurs.
     */
    public function prepareGeneration($id)
    {
        $contractModel = ContractModel::findOrFail($id);

        // Extraction des variables du template, par exemple {nom}, {prenom}, etc.
        preg_match_all('/\{(\w+)\}/', $contractModel->content, $matches);
        $variables = array_unique($matches[1]);

        return view('contract_models.prepare', compact('contractModel', 'variables'));
    }

    /**
     * Génère le contrat final en remplaçant les variables par les valeurs saisies.
     * Le contrat généré est sauvegardé dans la table contracts.
     */
    public function generate(Request $request, $id)
    {
        $contractModel = ContractModel::findOrFail($id);

        // Extraction des variables
        preg_match_all('/\{(\w+)\}/', $contractModel->content, $matches);
        $variables = array_unique($matches[1]);

        // Vérifie que toutes les variables ont bien une valeur saisie
        foreach ($variables as $variable) {
            if (!$request->has($variable)) {
                return redirect()->back()->with('error', "La valeur pour {$variable} est manquante.");
            }
        }

        // Remplacement des variables par leurs valeurs
        $finalContent = $contractModel->content;
        foreach ($variables as $variable) {
            $value = $request->input($variable);
            $finalContent = str_replace("{{$variable}}", $value, $finalContent);
        }

        // Création du contrat final (n'oublie pas d'ajouter les champs supplémentaires si nécessaire)
        $contract = new Contract();
        $contract->content = $finalContent;
        $contract->user_id = auth()->id();
        $contract->save();

        return redirect()->route('contracts.show', $contract->id)
            ->with('success', 'Contrat généré avec succès.');
    }
}