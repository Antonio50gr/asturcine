@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista usuarios</h1>
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
                    <th>Id usuario</th>
                    <th>Nombre usuario</th>
                    <th>Email</th>
                    <th colspan="2"></th>
                </tr>
            </thead>

            <tbody>
           @foreach ($usuarios as $usuario)
            <tr>
                <td>{{$usuario->id}}</td>
                <td>{{$usuario->name}}</td>
                <td>{{$usuario->email}}</td>
                
                <td>
                <form action="{{ route('admin.usuarios.destroy', $usuario) }}" method="POST">

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
        {{ $usuarios->links() }}
    </div>
@stop

 <!-- Scripts -->
 @vite(['resources/css/app.css', 'resources/js/app.js'])

