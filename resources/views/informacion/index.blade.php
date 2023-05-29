<x-app-layout>
    <div class="container py-8">
        <div class="grid">
        <style>

.card {
  position: relative;
  z-index: 0;
}

nav {
  position: relative;
  z-index: 1;
}


            
    
</style>

<link rel="stylesheet" type="text/css" href="https://kenwheeler.github.io/slick/slick/slick.css">
<link rel="stylesheet" type="text/css" href="https://kenwheeler.github.io/slick/slick/slick-theme.css">

        
  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="https://kenwheeler.github.io/slick/slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).on('ready', function() {
      
      $(".regular").slick({
        dots: true,
        infinite: true,
        slidesToShow: 6,
        slidesToScroll: 6
      });
      
    });
</script>
@can('Ver menus')
  <div class="menu">
      @foreach($generosArray['genres'] as $genero) 
          <a href="{{ route('generos.show',['genero'=>$genero['id']]) }}">{{$genero['name']}}</a>
      @endforeach
  </div>
@endcan

<div class="card">
  <div class="card_left ">
  <img src="https://image.tmdb.org/t/p/w300{{$informacionArray['poster_path']}}" class="card-img-top" alt="...">
  </div>
          <div class="card_right">
              <h1 class="titulo-pelicula"> {{$informacionArray['title']}}</h1>
            <div class="card_right__details">
                <ul>
                  <li>Fecha de estreno: {{$informacionArray['release_date']}}</li>
                  <li>Duracion: {{$informacionArray['runtime']}} min</li>
                </ul>
              
                <div class="card_right__review">
                @if (Auth::check())
                <p>Nota media: {{ number_format($notamedia, 1) }}</p>
                @endif
                  <div class="biografia">
                  <p class="card-text">{{$informacionArray['overview']}}</p>
                  </div>
                </div>
                @can('Ver menus')
                @if($trailerArray['results'])
                  <div class="card_right__button">
                    <a href="https://www.youtube.com/watch?v={{$trailerArray['results'][0]['key']}}" target="_blank">VER TRAILER</a>
                  </div>
                @endif
                @endcan
            </div>
          </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        @can('Ver menus')
        <div class="sliders-container">
          <section class="regular slider">
              @foreach($informacionsimilarArray['results'] as $informacionsimilar) 
                @if($informacionsimilar['poster_path'])
                  <a href="{{ route('informacion.index',['codigo'=>$informacionsimilar['id']]) }}">
                    <img src="https://image.tmdb.org/t/p/w300{{$informacionsimilar['poster_path']}}" class="card-img-top" alt="...">
                  </a>
                @endif
              @endforeach 
          </section>
        </div>
        @endcan

        @can('Ver menus')
          
              <div class="post-comment padding-top40">
                <h3>Deje su comentario</h3>
                <form action="{{route('comentario.store')}}" role="form">

                  <div class="form-group">
                    <label>Nombre</label>
                    <input class="form-control" type="text" value="{{Auth::user()->name}}" readonly>
                  </div>
                  
                  <div class="form-group">
                    <label>Email <span class="color-red"></span></label>
                    <input class="form-control" type="text" value="{{Auth::user()->email}}" readonly>
                  </div> 

                  <div class="form-group"> 
                    <label>Mensaje </label>
                    <textarea class="form-control" name="comentario" rows="8" required></textarea>

                    <input type="hidden" name="usuario_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="pelicula_id" value="{{$informacionArray['id']}}">
                  </div>
                  
                  <p><button class="btn btn-primary" type="submit">Enviar</button></p>
                </form>
              </div>
          
          

          @if (Auth::check())
              <div class="post-comment padding-top40">
                <h3>Deje su valoracion</h3>
                <form action="{{route('valoracion.store')}}" role="form">
                  <div class="form-group"> 
                    <label>Valoración</label>
                    <input class="form-control" type="number" name="valoracion" min="1" max="10" required>
                    <input type="hidden" name="usuario_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="pelicula_id" value="{{$informacionArray['id']}}">
                  </div>
                  
                  <p><button class="btn btn-primary" type="submit">Enviar</button></p>
                </form>
              </div>
          @endif
          <div class="comment-section">
            <h3>Comentarios</h3>
              <div class="comment-container">
              @foreach ($comentarios as $comentario) 
                  <div class="comment-box">
                      <div class="comment-content">
                          <div>
                              <p class="comment-name">{{ $comentario->user->name }}</p>
                              <p class="comment-text">{{ $comentario->comentario }}</p>
                              <p class="comment-date">{{ $comentario->created_at }}</p>
                          </div>
                      </div>
                  </div>
              @endforeach
          </div>

<h3>Valoraciones</h3>
    <div class="comment-container">
    @foreach ($valoraciones as $valoracion) 
        <div class="comment-box">
            <div class="comment-content">
                <div>
                    <p class="comment-name">{{ $valoracion->user->name }}</p>
                    <p class="comment-text">{{ $valoracion->valoracion }}</p>
                    <p class="comment-date">{{ $valoracion->created_at }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endcan
</div>

      </div>
    </div>
  </x-app-layout>

<link href="{{ asset('css/styles.css') }}" rel="stylesheet">