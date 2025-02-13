<?php

namespace App\Http\Controllers;

use App\Models\Box;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BoxController extends Controller
{
    public function index()
    {
        // Récupérer toutes les box
        $boxes = Box::where('owner_id', Auth::id())->get();
        return view('boxes.index', ['boxes' => $boxes]);
    }

    public function create()
    {
        return view('boxes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contenu' => 'nullable|string',
            'price' => 'required|numeric',
        ]);

        $box = new Box($request->all());
        $box->owner_id = Auth::id();
        $box->save();

        return redirect()->route('boxes.index')
            ->with('success', 'Box created successfully.');
    }

    public function show(Box $box)
    {
        return view('boxes.show', ['box' => $box]);
    }

    public function edit(Box $box)
    {
        return view('boxes.edit', ['box' => $box]);
    }

    public function update(Request $request, Box $box)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contenu' => 'nullable|string',
            'price' => 'required|numeric',
        ]);

        $box->update($request->all());
        return redirect()->route('boxes.index')
            ->with('success', 'Box updated successfully.');
    }

    public function destroy(Box $box)
    {
        $box->delete();
        return redirect()->route('boxes.index')
            ->with('success', 'Box deleted successfully.');
    }
}


