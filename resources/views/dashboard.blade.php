
<head>
    
    <style>
              .menu {
                background-color: black !important;
                display: flex !important;
                justify-content: center !important;
                align-items: center !important;
                flex-wrap: wrap; 
            }

        .menu a {
                color: yellow !important;
                font-size: 18px !important;
                margin: 0 10px !important;
            }
    </style>
    <link href="{{ asset('css/styles2.css') }}" rel="stylesheet">
</head>

<x-app-layout>

    <div class="menu">
        @foreach($generosArray['genres'] as $genero) 
            <div class="p-2">
                <a href="{{ route('generos.show',['genero'=>$genero['id']]) }}">{{$genero['name']}}</a>
            </div>
        @endforeach
    </div>

    

    <div class="peliculas-container py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="peliculas-container clearfix">
                    @foreach($peliculasArray['results'] as $pelicula) 
                        <div class="col">
                            <div class="card">
                                <a href="{{ route('informacion.index',['codigo'=>$pelicula['id']]) }}">
                                @if(!empty($pelicula['poster_path']))   
                                    <img src="https://image.tmdb.org/t/p/w300{{$pelicula['poster_path']}}" >
                                @else
                                <img src="{{ asset('images/logo.PNG') }}" >
                                @endif     
                                </a>
                                <div class="descriptions">
                                    <h1>
                                        <a href="{{ route('informacion.index',['codigo'=>$pelicula['id']]) }}">
                                            {{$pelicula['title']}}
                                        </a>
                                    </h1>
                                    <p>
                                    <a href="{{ route('informacion.index',['codigo'=>$pelicula['id']]) }}">
                                        {{$pelicula['overview']}}
                                    </a>
                                        
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
