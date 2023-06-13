<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

use App\Models\Comentario;

use App\Models\Valoracion;

class InformacionController extends Controller
{
    public function index(int $codigo){
        $generos = HTTP::get('https://api.themoviedb.org/3/genre/movie/list?api_key=bad8933ed9f09142c82f2159db3edce3&language=es-ES');
        $generosArray = $generos->json();
      
        $informacion = HTTP::get('https://api.themoviedb.org/3/movie/'.$codigo.'?api_key=bad8933ed9f09142c82f2159db3edce3&language=es-ES'); 
        $informacionArray = $informacion->json();

        $trailer = HTTP::get('https://api.themoviedb.org/3/movie/'.$codigo.'/videos?api_key=bad8933ed9f09142c82f2159db3edce3&language=es-ES'); 
        $trailerArray = $trailer->json();

        $informacionsimilar = HTTP::get('https://api.themoviedb.org/3/movie/'.$codigo.'/similar?api_key=bad8933ed9f09142c82f2159db3edce3&language=es-ES&page=1'); 
        $informacionsimilarArray = $informacionsimilar->json();
        
        //consulta coincide id, en $comentarios se almacena la info para mostrar comentarios
        $comentarios = Comentario::where('pelicula_id', $informacionArray['id'])->get();
        //consulta coincide id, en $valoraciones se almacena la info para mostrar valoraciones
        $valoraciones = Valoracion::where('pelicula_id', $informacionArray['id'])->get();

        $notamedia = $this->calculateAverageRating($informacionArray['id']);
        
        return view('informacion.index', compact('informacionArray','generosArray','trailerArray','informacionsimilarArray', 'comentarios','valoraciones', 'notamedia'));
    }

    public function show(Info $info){
      return view('informacion.show', compact('info')); 
    }

    public function calculateAverageRating($peliculaId)
    {
        $valoraciones = Valoracion::where('pelicula_id', $peliculaId)->pluck('valoracion');
        $notamedia = $valoraciones->avg();

        return $notamedia;
    }
    

}
