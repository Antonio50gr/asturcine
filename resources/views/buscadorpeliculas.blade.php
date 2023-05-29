<head>
    <style>
        .poster {
            width: 200px;
        }

        .menu {
            background-color: black !important;
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            height: 50px;
            flex-wrap: wrap; 
        }

        .menu a {
            color: yellow !important;
            font-size: 18px !important;
            margin: 0 10px !important;
        }

        .card {
            display: none;
            position: relative;
            z-index: 0;
        }

        .card_right{
            height: auto !important;
        }

        .card_right__button {
        margin: 30px 0 0 0 !important;
        }

        .card_right__trailer {
        margin-top: 250px; 
        max-width: 100%;
        }

        .card_right__trailer iframe {
        width: 100%;
        height: 300px;
        }


        nav {
        position: relative;
        z-index: 1;
        }

        .container {
        max-width: 100%;
        width: 100%; 
        justify-content: center;
        margin: 0 auto; 
        display: flex;
        flex-wrap: wrap;
       
        }

        .box {
        display: flex;
        margin-bottom: 20px;
        flex-wrap: wrap; 
        justify-content: center;
        align-items: center;
        
        }




    </style>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    
    <script>
        $(document).ready(function() {                      //metodo ready, verifico que el html fue cargado correctamente
            $('#searchBtn').click(function() {              //asigno evento click al id searchBtn               
                let query = $('#query').val();              // obtengo valor de query, almacenando en query          
                $.getJSON("https://api.themoviedb.org/3/search/movie?api_key=bad8933ed9f09142c82f2159db3edce3&language=es-US&query=" + query + "&page=1&include_adult=false", function(data) {
                    console.log(data.results[0]);
                    $('#movie_name').html(data.results[0].title);
                    $('#movie_desc').html(data.results[0].overview);
                    $('#release_date').html("Fecha estreno: "+data.results[0].release_date);
                    $('#poster').attr("src", "https://image.tmdb.org/t/p/w500" + data.results[0].poster_path);
                    $('#trailer').attr("src", ""); // Reinicio el enlace del trailer

                    let movieId = data.results[0].id; //obtengo id de la primera pelicula encontrada y almaceno en movieId
                    $.getJSON("https://api.themoviedb.org/3/movie/" + movieId + "/videos?api_key=bad8933ed9f09142c82f2159db3edce3&language=es-US", function(trailerData) {
                if (trailerData.results.length > 0) { //verifico si hay trailer
                    let trailerKey = trailerData.results[0].key;
                    let trailerUrl = "https://www.youtube.com/embed/" + trailerKey;
                    $('#trailer').attr("src", trailerUrl); // Establezco el enlace del trailer
                }
            });
                    $('.card').show();
                });
                
            });
        });
    </script>
</head>

<x-app-layout>

    <div class="container">
        <div class="box">
            <input type="text" id="query" placeholder="Buscar película..." />
            <button id="searchBtn">Buscar</button>
        </div>
    </div>


<div class="card">
  <div class="card_left ">
  <img src="" class="poster" id="poster" />
  </div>
          <div class="card_right">
            
              <h1 class="titulo-pelicula" ></h1>
              <p class="titulo-pelicula" id="movie_name"></p>
             
            <div class="card_right__details">
                <ul>
                    <li class="card-text" id="release_date">Fecha de estreno:</li>
                </ul>

                <div class="card_right__review">
                  <div class="biografia">
                    <p class="card-text" id="movie_desc"></p>
                  </div>
                </div>
                
              
                <div class="card_right__trailer">
                    <iframe id="trailer" width="450" height="300" src="" frameborder="0" allowfullscreen></iframe>
                </div>
               
              
            </div>
          </div>
        </div>

        
                

 

</x-app-layout>
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">