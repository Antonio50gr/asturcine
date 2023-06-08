<?php

namespace App\Http\Controllers;

use App\Models\Valoracion;
use Illuminate\Http\Request;
use App\Http\Requests\ValoracionRequest;

class ValoracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValoracionRequest $request)
    {
        //obtengo valor campos
        $usuario_id = $request->usuario_id;
        $pelicula_id = $request->pelicula_id;
        $valoracion = $request->valoracion;
    
        // verifico si existe una valoracion para el usuario y la pelicula
        $valoracionExistente = Valoracion::where('usuario_id', $usuario_id)->where('pelicula_id', $pelicula_id)->first();
    
        if ($valoracionExistente) {
        // Actualizo la valoracion que ya existe
            $valoracionExistente->valoracion = $valoracion;
            $valoracionExistente->save();
        } else {
         // Creo una nueva valoracion si no existe
            $nuevaValoracion = new Valoracion();
            $nuevaValoracion->usuario_id = $usuario_id;
            $nuevaValoracion->pelicula_id = $pelicula_id;
            $nuevaValoracion->valoracion = $valoracion;
            $nuevaValoracion->save();
        }
    
        return redirect()->back()->with('success', 'Valoración agregada exitosamente.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Valoracion  $valoracion
     * @return \Illuminate\Http\Response
     */
    public function show(Valoracion $valoracion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Valoracion  $valoracion
     * @return \Illuminate\Http\Response
     */
    public function edit(Valoracion $valoracion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Valoracion  $valoracion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Valoracion $valoracion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Valoracion  $valoracion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Valoracion $valoracion)
    {
        //
    }
}
