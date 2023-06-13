<x-app-layout>
  
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

    <div class="peliculas-container py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="peliculas-container clearfix">
                    @foreach($proximaspeliculasArray['results'] as $proximaspeliculas) 
                        <div class="col">
                            <div class="card">
                            <a href="{{ route('informacion.index',['codigo'=>$proximaspeliculas['id']]) }}">
                                    <img src="https://image.tmdb.org/t/p/w300{{$proximaspeliculas['poster_path']}}" >
                            </a>
                                <div class="descriptions">
                                    <h1>
                                        <a href="{{ route('informacion.index',['codigo'=>$proximaspeliculas['id']]) }}">
                                                {{$proximaspeliculas['title']}}
                                        </a>
                                    </h1>

                                    <p>
                                        <a href="{{ route('informacion.index',['codigo'=>$proximaspeliculas['id']]) }}">
                                                {{$proximaspeliculas['overview']}}
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

<link href="{{ asset('css/styles2.css') }}" rel="stylesheet">         
