<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;



class DashboardController extends Controller


{
      /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //Petición a la API de para obtener las películas más populares
         $peliculas = HTTP::get('https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=bad8933ed9f09142c82f2159db3edce3&language=es-ES&region=ES');
      //respuesta de la API a un array 
         $peliculasArray = $peliculas->json();
      //Petición a la API de para obtener los géneros de películas
         $generos = HTTP::get('https://api.themoviedb.org/3/genre/movie/list?api_key=bad8933ed9f09142c82f2159db3edce3&language=es-ES');
      //respuesta de la API  a un array 
         $generosArray = $generos->json();
      //Retorno la vista dashboard y paso los arrays de películas y géneros 
         return view('dashboard', compact('peliculasArray','generosArray'));
    }

    public function show(int $genero){
        // Petición a la API para obtener los géneros de películas
            $generos = HTTP::get('https://api.themoviedb.org/3/genre/movie/list?api_key=bad8933ed9f09142c82f2159db3edce3&language=es-ES');
        // Convierto la respuesta de la API a un array 
            $generosArray = $generos->json();
        // Realizo una petición  para obtener las películas más populares en España del género especificado
            $peliculas = HTTP::get('https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=bad8933ed9f09142c82f2159db3edce3&language=es-ES&region=ES&with_genres='.$genero);
        // La respuesta de la API a un array 
            $peliculasArray = $peliculas->json();
        // Retorno la vista dashboard y paso los arrays de películas y géneros 
            return view('dashboard', compact('peliculasArray','generosArray'));
      }
    
}





