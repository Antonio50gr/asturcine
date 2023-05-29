<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class BuscadorPeliculasController extends Controller
{
    public function index()
    {
         $generos = HTTP::get('https://api.themoviedb.org/3/genre/movie/list?api_key=bad8933ed9f09142c82f2159db3edce3&language=es-ES');
         $generosArray = $generos->json();
         

         return view('buscadorpeliculas', compact('generosArray'));
    }

    public function show(int $genero)
    {
            $generos = HTTP::get('https://api.themoviedb.org/3/genre/movie/list?api_key=bad8933ed9f09142c82f2159db3edce3&language=es-ES');
            $generosArray = $generos->json();
       
            return view('buscadorpeliculas', compact('generosArray'));
      }

      
}
