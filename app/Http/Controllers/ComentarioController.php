<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Http\Requests\ComentarioRequest;

class ComentarioController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComentarioRequest $request)
    {   
         $comentario = new Comentario;
         $comentario->comentario = $request->comentario;
         $comentario->usuario_id = $request->usuario_id;
         $comentario->pelicula_id = $request->pelicula_id;
         $comentario->save();
        
        return redirect()->back()->with('success', 'Comentario agregado exitosamente.');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentario $comentario)
    {
        //
    }
}
