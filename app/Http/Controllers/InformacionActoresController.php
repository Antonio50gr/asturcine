<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class InformacionActoresController extends Controller
{
    public function index(int $codigo){
     
        
        $informacionactor = HTTP::get('https://api.themoviedb.org/3/person/'.$codigo.'?api_key=bad8933ed9f09142c82f2159db3edce3&language=es-ES'); 
            
        $informacionactorArray = $informacionactor->json();

        $informacionsearchactor = HTTP::get('https://api.themoviedb.org/3/person/'.$codigo.'?api_key=bad8933ed9f09142c82f2159db3edce3&language=es-ES'); 

        $informacionsearchactorArray = $informacionsearchactor->json();

        $informacioncreditosactor = HTTP::get('https://api.themoviedb.org/3/person/'.$codigo.'/movie_credits?api_key=bad8933ed9f09142c82f2159db3edce3&language=es-ES'); 

        $informacioncreditosactorArray = $informacioncreditosactor->json();
       
        return view('informacion.infoactores', compact('informacionactorArray', 'informacionsearchactorArray','informacioncreditosactorArray'));
    }

    public function show(Info $info){
      

      return view('informacionactor.show', compact('info')); 
    }


}
