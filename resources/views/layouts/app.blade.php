<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DITSEL') }}</title>

    <meta name="description" content="Diccionario Tseltal en Línea" />
    <meta name="keywords" content="diccionario, tseltal, tsozil, chiapas, maya, diccionario maya" />
    <meta name="author" content="www.ionatomico.com" />
    <meta name="copyright" content="ALDELIM" />
    <meta name="robots" content="index,follow" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta property="og:url" content="http://ditsel.aldelim.org">
    <meta property="og:image" content="http://www.aldelim.org/img/5.jpg">
    <meta property="og:site_name" content="DITSEL" />
    <meta property="og:title" content="DITSEL" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Diccionario Tseltal en Línea" />
    <link rel="canonical" href="http://ditsel.aldelim.org/">
    <link rel="icon" type="image/x-icon" href="http://www.aldelim.org/img/5.jpg" />

    <!-- Styles -->
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/_app.css') }}" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet">

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> --}}

</head>

<body>

    <nav class="navbar navbar-default " style="background: #99d4ce; padding: 20px; padding-bottom: 30px;">
        <div class="row">
            <!-- Collapsed Hamburger -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <div class="navTitle">
                    <a class="" href="{{ route('index') }}">
                        <span style="font-size: xx-large;">DITSEL</span>
                    </a>
                </div>
            </div>

            <div class="navPc" id="app-navbar-collapse">

            <div class="boxCitar">
              <h2>Diccionario Tseltal en Linea</h2>
              <button class="btnCitar" data-toggle="modal"data-target="#myModal">Citar</button>
            </div>

                <!-- CITAR Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <?php $date = date('d/m/Y');?>
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Polian, Gilles. 2019. <i>Diccionario tseltal en línea</i>,
                                  disponible en <a target="_blank" href="http://ditsel.aldelim.org">ditsel.aldelim.org</a>,
                                  consultado el {{ $date }}.</h4>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btnLinks">
                  <a href="{{ route('donativos') }}">Donativos</a>
                  <a href="{{ route('antecedentes') }}">Antecedentes</a> 
                  <a href="{{ route('colaboradores') }}">Colaboradores</a>        
                  <a href="{{ route('index') }}">Teltal</a>        
                  <a href="{{ route('espanol') }}">Español</a>       
              </div>

            </div>
        </div>
    </nav>


    @yield('menuabc')

    @yield('busqueda')

    @yield('content')

    <footer>

        <div class="row text-center" id="footer">

            <h3>Comentarios y sugerencias: <span style="color: white;">diccionariotseltal@gmail.com</span></h3>

            <h3>
                <a target="_blank"
                    href="https://www.academia.edu/44263742/Diccionario_multidialectal_del_tseltal_tseltal_espa%C3%B1ol">Descargar
                    el diccionario en pdf</a>
            </h3>


            <a href="https://ionatomico.com/" target="_blank">
                <img src="https://www.sancristobalenlascasas.com/img/ATOMICO.png"
                    alt="ionatomico"onmouseover="this.src='https://www.sancristobalenlascasas.com/img/ATOMICO-AMARILLO.png';"
                    onmouseout="this.src='https://www.sancristobalenlascasas.com/img/ATOMICO.png';"style="max-width: 100px;">
            </a>

        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone.js') }}"></script>

    @yield('scripts')


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#lx').keyup(function(e) {
                var query = $(this).val();
                if (e.keyCode === 13) {
                    // Si se presiona la tecla "Enter" (keyCode 13), realizar la búsqueda
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('tseltal_fetch') }}",
                        method: "POST",
                        data: {
                            query: query,
                            _token: _token
                        },
                        success: function(data) {
                            $('#lxList').fadeIn();
                            $('#lxList').html(data);
                        }
                    });
                } else {
                    // Si se presiona otra tecla, ocultar el lxList
                    $('#lxList').fadeOut();
                }
            });
        });
        $(document).ready(function() {
            $('#espanol').keyup(function(e) {
                var query = $(this).val();
                if (e.keyCode === 13) {
                    // Si se presiona la tecla "Enter" (keyCode 13), realizar la búsqueda
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('espanol_fetch') }}",
                        method: "POST",
                        data: {
                            query: query,
                            _token: _token
                        },
                        success: function(data) {
                            $('#minList').fadeIn();
                            $('#minList').html(data);
                        }
                    });
                } else {
                    // Si se presiona otra tecla, ocultar el lxList
                    $('#minList').fadeOut();
                }
            });
        });
    </script>




</body>

</html>
