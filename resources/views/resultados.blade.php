<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resultados de búsqueda') }}
        </h2>
    </x-slot>

    <style>
        .card {
            margin-bottom: 20px;
        }
        .col {
            float: left;
            width: 25%;
            padding: 0 10px;
            box-sizing: border-box;
        }
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="peliculas-container clearfix">
                    @foreach($peliculasArray['results'] as $pelicula)
                        <div class="col">
                            <div class="card">
                                <a href="{{ route('informacion.index',['codigo'=>$pelicula['id']]) }}">
                                    <img src="https://image.tmdb.org/t/p/w300{{$pelicula['poster_path']}}" >
                                </a>
                                <div class="descriptions">
                                    <h1>
                                        <a href="{{ route('informacion.index',['codigo'=>$pelicula['id']]) }}">
                                            {{$pelicula['title']}}
                                        </a>
                                    </h1>
                                    <p>
                                        {{$pelicula['overview']}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<link href="{{ asset('css/styles2.css') }}" rel="stylesheet">