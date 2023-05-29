<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

use App\Models\Comentario;

use App\Models\Valoracion;

class InformacionSeriesController extends Controller
{
    public function index(int $codigo){
        $generos = HTTP::get('https://api.themoviedb.org/3/genre/tv/list?api_key=bad8933ed9f09142c82f2159db3edce3&language=es-ES');
        $generosArray = $generos->json();
        
        $informacionserie = HTTP::get('https://api.themoviedb.org/3/tv/'.$codigo.'?api_key=bad8933ed9f09142c82f2159db3edce3&language=es-ES'); 
        $informacionserieArray = $informacionserie->json();
          
        $trailer = HTTP::get('https://api.themoviedb.org/3/tv/'.$codigo.'/videos?api_key=bad8933ed9f09142c82f2159db3edce3&language=es-ES'); 
        $trailerArray = $trailer->json();
            
        $informacionsimilar = HTTP::get('https://api.themoviedb.org/3/tv/'.$codigo.'/similar?api_key=bad8933ed9f09142c82f2159db3edce3&language=es-ES&page=1'); 
        $informacionsimilarArray = $informacionsimilar->json();

        //consulta coincide id, en $comentarios se almacena la info
        $comentarios = Comentario::where('pelicula_id', $informacionserieArray['id'])->get();
        
        $valoraciones = Valoracion::where('pelicula_id', $informacionserieArray['id'])->get();

        $notamedia = $this->calculateAverageRating($informacionserieArray['id']);

        return view('informacion.infoseries', compact('informacionserieArray','generosArray','trailerArray','informacionsimilarArray','comentarios','valoraciones','notamedia'));
    }

    public function show(Info $info){
      

      return view('informacionserie.show', compact('info')); 
    }

    public function calculateAverageRating($peliculaId)
    {
        $valoraciones = Valoracion::where('pelicula_id', $peliculaId)->pluck('valoracion');
        $notamedia = $valoraciones->avg();

        return $notamedia;
    }


}




