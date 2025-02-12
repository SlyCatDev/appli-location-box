<?php

namespace App\Http\Controllers;

use App\Models\Box;
use Illuminate\Http\Request;


class BoxController extends Controller
{
    public function showBox()
    {
        // Récupérer toutes les box
        $boxes = Box::all();
        
        // Passer les box à la vue
        return view('boxes', ['boxes' => $boxes]);
    }

}

