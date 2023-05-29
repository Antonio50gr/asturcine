<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="peliculas-container">
                    @foreach($resultadoArray['results'] as $resultado)
                        <div class="wrapper">
                            <div class="card">
                                <a href="{{ route('informacion.index',['codigo'=>$resultado['id']]) }}">  <img src="https://image.tmdb.org/t/p/w300{{ $resultado['poster_path'] }}" ></a>
                                <div class="descriptions">
                                    <h1> <a href="{{ route('informacion.index',['codigo'=>$resultado['id']]) }}">{{ $resultado['title'] }}</a></h1>
                                    <p>{{ $resultado['overview'] }}</p>
                                    <button>
                                        <i class="fab fa-youtube"></i>
                                         Play trailer on YouTube
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>