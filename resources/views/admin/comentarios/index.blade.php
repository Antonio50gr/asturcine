@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista comentarios</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id comentario</th>
                    <th>Comentario</th>
                    <th>Id usuario</th>
                    <th>Id pelicula</th>
                    <th colspan="2"></th>
                </tr>
            </thead>

            <tbody>
           @foreach ($comentarios as $comentario)
            <tr>
                <td>{{$comentario->id}}</td>
                <td>{{$comentario->comentario}}</td>
                <td>{{$comentario->usuario_id}}</td>
                <td>{{$comentario->pelicula_id}}</td>
                <td>
                <form action="{{ route('admin.comentarios.destroy', $comentario) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach

            
            </tbody>
        </table>
    </div>
</div>

    <div class="mt-3">
        {{ $comentarios->links() }}
    </div>
    
@stop

 <!-- Scripts -->
 @vite(['resources/css/app.css', 'resources/js/app.js'])