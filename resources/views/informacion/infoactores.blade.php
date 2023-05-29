
   
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

        <div class="card">
  <div class="card_left">
  <img src="https://image.tmdb.org/t/p/w300{{$informacionactorArray['profile_path']}}" class="card-img-top" alt="...">
  </div>
                  <div class="card_right">
                      <h1> {{$informacionactorArray['name']}}</h1>
                    <div class="card_right__details">
                      <ul>
                        <li>Fecha de nacimiento: {{$informacionactorArray['birthday']}}</li> <br>
                        <li>Lugar de nacimiento: {{$informacionactorArray['place_of_birth']}}</li>
                      </ul>
                      
                      <div class="card_right__review">
                        <p class="card-text">{{$informacionactorArray['known_for_department']}}</p>
                        <div class="biografia">
                          <p class="card-text">{{$informacionactorArray['biography']}}</p> 
                        </div>
                      </div>
            </div>
          </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        @can('Ver menus')
              <div class="sliders-container">
                <section class="regular slider">
                    @foreach($informacioncreditosactorArray['cast'] as $informacioncreditosactor) 
                      @if($informacioncreditosactor['poster_path'])
                        <a href="{{ route('informacion.index',['codigo'=>$informacioncreditosactor['id']]) }}">
                          <img src="https://image.tmdb.org/t/p/w300{{$informacioncreditosactor['poster_path']}}" class="card-img-top" alt="...">
                        </a>
                      @endif
                    @endforeach 
                </section>
              </div>
        @endcan
      </div>
    </div>
  </x-app-layout>

<link href="{{ asset('css/styles.css') }}" rel="stylesheet">