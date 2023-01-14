<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\User;
use App\Models\Panier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FilmController;

class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $paniers = Panier::where('user_id', $user->id)->get();
        // $paniers->load('films');
        $paniers = Panier::where('user_id', Auth::user()->id)->get();
        $paniers->load('film', 'user');
        // $produits = $paniers->films;

        // dd($paniers);
        return view('panier', compact('paniers'));

        // return view('index');
    }
    public function store(Film $film)
    {
        $panier = new Panier();
        $panier->film_id = $film->id;
        $panier->user_id = Auth::user()->id;
        $panier->save();
        return redirect()->route('home');
    }

    public function delet($id) {
        // dd($id);
        $film = Panier::where('id', $id)->where('user_id', Auth::user()->id);
        // dd($film);
        $film->delete();
        return redirect()->route('panier.index');

    }
    public function remove_all_panier() {
        // dd($îd);
        $films = Panier::where('user_id', Auth::user()->id)->get();
        // dd($film);
        foreach($films as $film){
            $film->delete();

        };
        
        return redirect()->route('panier.index');

    }
    
}
