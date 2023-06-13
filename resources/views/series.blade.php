<x-app-layout>
  
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

        <div class="menu">
            @foreach($generosArray['genres'] as $genero) 
                <div class="p-2">
                    <a href="{{ route('generosseries.show',['generosseries'=>$genero['id']]) }}">{{$genero['name']}}</a>
                </div>
            @endforeach
        </div>


    <div class="peliculas-container py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="peliculas-container clearfix">
                    @foreach($seriesArray['results'] as $serie) 
                        <div class="col">
                            <div class="card">
                                <a href="{{ route('informacion.infoseries',['codigo'=>$serie['id']]) }}">
                                @if(!empty($serie['poster_path']))  
                                    <img src="https://image.tmdb.org/t/p/w300{{$serie['poster_path']}}" >
                                @else  
                                <img src="{{ asset('images/logo.PNG') }}" >
                                @endif
                                </a>
                                <div class="descriptions">
                                    <h1>
                                        <a href="{{ route('informacion.infoseries',['codigo'=>$serie['id']]) }}">
                                            {{$serie['name']}}
                                        </a>
                                    </h1>
                                    <p>
                                    <a href="{{ route('informacion.infoseries',['codigo'=>$serie['id']]) }}">
                                            {{$serie['overview']}}
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

   