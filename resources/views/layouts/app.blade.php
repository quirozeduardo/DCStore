<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>DCStore</title>

        {!! Html::style('bootstrap/css/bootstrap.min.css') !!}
        {!! Html::style('css/style.css') !!}

    </head>
    <body>
        <header class="bg-primary">
            <nav class="container navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="{{ url('/') }}">Inicio</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                 <!-- <li class="nav-item active">
                    <a class="nav-link" href="#">Inicio</a>
                  </li>-->
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Peliculas(Generos)
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ url('/movies') }}">Todo</a>
                      <div class="dropdown-divider"></div>
                      @inject('genders','DCStore\Gender')
                      @foreach($genders::all() as $gender)
                        <a class="dropdown-item" href="#">{{$gender->gender}}</a> 
                      @endforeach                                           
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Peliculas(Calidad)
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ url('/movies') }}">Todo</a>
                      <div class="dropdown-divider"></div>
                      @inject('qualitys','DCStore\Quality')
                      @foreach($qualitys::all() as $quality)
                        <a class="dropdown-item" href="#">{{$quality->quality}}</a> 
                      @endforeach 
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      Series
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      Juegos
                    </a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="#">
                      Software
                    </a>
                  </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                </form>
                </div>
            </nav>
        </header>
        <div class="container">
            <div class="row">
                <div class="slide col-12">
                    @include('templates.partials.slider')
                </div>
                <div class="col-12">
                    <div class="row">
                        <section class="col-md-9 col-12">
                            @yield('content')
                        </section>
                        <aside class="col-md-3 col-12">
                            aside
                        </aside>
                    </div>
                </div>
            </div>
        </div>

    
     {!! Html::script('js/jquery-3.3.1.min.js') !!}
     {!! Html::script('js/popper.min.js') !!}
     {!! Html::script('bootstrap/js/bootstrap.min.js') !!}
     {!! Html::script('js/jCarousel.min.js') !!}
     <script>
       (function($) {
          $(function() {
              var jcarousel = $('.jcarousel');

              jcarousel
                  .on('jcarousel:reload jcarousel:create', function () {
                      var carousel = $(this),
                          width = carousel.innerWidth();

                      if (width >= 600) {
                          width = width / 3;
                      } else if (width >= 350) {
                          width = width / 2;
                      }

                      carousel.jcarousel('items').css('width', Math.ceil(width) + 'px');
                  })
                  .jcarousel({
                      wrap: 'circular'
                  });

              $('.jcarousel-control-prev')
                  .jcarouselControl({
                      target: '-=1'
                  });

              $('.jcarousel-control-next')
                  .jcarouselControl({
                      target: '+=1'
                  });

              $('.jcarousel-pagination')
                  .on('jcarouselpagination:active', 'a', function() {
                      $(this).addClass('active');
                  })
                  .on('jcarouselpagination:inactive', 'a', function() {
                      $(this).removeClass('active');
                  })
                  .on('click', function(e) {
                      e.preventDefault();
                  })
                  .jcarouselPagination({
                      perPage: 1,
                      item: function(page) {
                          return '<a href="#' + page + '">' + page + '</a>';
                      }
                  });
          });
      })(jQuery);
     </script>
    </body>
</html>
