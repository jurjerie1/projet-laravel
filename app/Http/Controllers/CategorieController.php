<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategorieController extends Controller

{
    public function show_action(){
        $films = Film::where('categorie_id', 1)->get();
        // dd($films);
        return view('films', compact('films'));
        // echo 'fe';
        // dd('test');
    }

    public function show_drame(){
        $films = Film::where('categorie_id', 2)->get();
        // dd($films);
        return view('films', compact('films'));
        // echo 'fe';
        // dd('test');
    }
}
