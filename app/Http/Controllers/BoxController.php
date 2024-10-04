<?php

namespace App\Http\Controllers;

use App\Models\Box;
use Illuminate\Http\Request;


class BoxController extends Controller
{
    public function showBox()
    {
        // Récupérer toutes les réservations
        $boxes = Box::all();
        
        // Passer les réservations à la vue
        return view('boxes', ['boxes' => $boxes]);
    }

}

