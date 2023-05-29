<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Http;

class SeriesController extends Controller
{
     public function index()
    {
        $series = HTTP::get('https://api.themoviedb.org/3/discover/tv?api_key=bad8933ed9f09142c82f2159db3edce3&language=es-ES&sort_by=popularity.desc&page=1&include_null_first_air_dates=false&with_watch_monetization_types=flatrate&with_status=0&with_type=0');
        $seriesArray = $series->json();
         
        $generos = HTTP::get('https://api.themoviedb.org/3/genre/tv/list?api_key=bad8933ed9f09142c82f2159db3edce3&language=es-ES');
        $generosArray = $generos->json();
         
        return view('series', compact('seriesArray','generosArray'));
    }

    public function show(int $genero){
        $generos = HTTP::get('https://api.themoviedb.org/3/genre/tv/list?api_key=bad8933ed9f09142c82f2159db3edce3&language=es-ES');
        $generosArray = $generos->json();

        $series = HTTP::get('https://api.themoviedb.org/3/discover/tv?api_key=bad8933ed9f09142c82f2159db3edce3&language=es-ES&sort_by=popularity.desc&page=1&include_null_first_air_dates=false&with_watch_monetization_types=flatrate&with_status=0&with_type=0&with_genres='.$genero);
        $seriesArray = $series->json();

        return view('series', compact('seriesArray','generosArray'));
  }
}
