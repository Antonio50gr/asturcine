<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class ProximasPeliculasController extends Controller
{
    public function index()
    {
        $proximaspeliculas = HTTP::get('https://api.themoviedb.org/3/movie/upcoming?api_key=bad8933ed9f09142c82f2159db3edce3&language=es-ES&page=1&region=es');
        $proximaspeliculasArray = $proximaspeliculas->json();
         
        return view('proximaspeliculas', compact('proximaspeliculasArray'));
    }

    
    public function show(){

        $proximaspeliculas = HTTP::get("https://api.themoviedb.org/3/movie/upcoming?api_key=bad8933ed9f09142c82f2159db3edce3&language=es-ES&page=1&region=es");
        $proximaspeliculasArray = $proximaspeliculas->json();

        return view('proximaspeliculas', compact('proximaspeliculasArray'));
  }

}
