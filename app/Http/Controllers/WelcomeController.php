<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculatendencias = HTTP::get('https://api.themoviedb.org/3/trending/movie/week?api_key=bad8933ed9f09142c82f2159db3edce3&language=es-ES');

        $peliculatendenciasArray = $peliculatendencias->json();

        $serietendencias = HTTP::get('https://api.themoviedb.org/3/trending/tv/week?api_key=bad8933ed9f09142c82f2159db3edce3&language=es-ES');

        $serietendenciasArray = $serietendencias->json();

        $actortendencias = HTTP::get('https://api.themoviedb.org/3/trending/person/week?api_key=bad8933ed9f09142c82f2159db3edce3&language=es-ES');

        $actortendenciasArray = $actortendencias->json();

        return view('welcome', compact('peliculatendenciasArray','serietendenciasArray','actortendenciasArray'));
    }

    
   

}
