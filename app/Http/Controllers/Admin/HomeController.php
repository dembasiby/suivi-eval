<?php

namespace App\Http\Controllers\Admin;

use App\Models\Indicateur;
use App\Models\Reponse;
use App\Models\Question;

class HomeController
{
    public function index()
    {

        $indicateurs = Indicateur::paginate(25);

        $reponses = Reponse::all();

        return view('home', compact('indicateurs', 'reponses'));
    }
}
