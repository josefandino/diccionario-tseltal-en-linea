@extends('layouts.app')

@section('css')
    <style>
        li {
            font-size: inherit;
        }

        h3 {
            line-height: 30px;
        }
    </style>
@endsection

@section('menuabc')
    @include('layouts.menuabc')
@endsection


@section('busqueda')
    @include('layouts.tseltal')
@endsection


@section('content')


    <div class="text-center" style="padding: 20px; line-height: 25px; font-weight: initial;">

        @if (isset($palabras))
            <div class="" style="padding: 20px; line-height: 25px; font-weight: initial;">
                @foreach ($palabras as $palabra)
                    <a href="{{ route('ver', $palabra->lxid) }}">
                        <h3>{!! $palabra->lx !!}</h3>
                        <h5>{!! $palabra->ps !!}</h5>
                    </a>
                    <hr>
                @endforeach
            </div>
        @else
            <div class="row">


                <div class="col-md-12">
                    <div class="">
                        <h1 style="font-size: 300%;">ANTECEDENTES</h1>

                    </div>

                </div>


            </div>


            <div class="" id="antecedentes" style="text-align: justify;">
                <h2><b>Antecedentes del DiTseL</b></h2>
                <h3>
                    El DiTseL es la última etapa de un amplio trabajo de registro del léxico del idioma maya tseltal. Este
                    trabajo inició como tal en 2010 con el proyecto “Documentación lingüística, estudio de la variación
                    dialectal y elaboración de un vocabulario comparativo en tseltal”, financiado por el CONACYT, a
                    través de Fondo SEP-CONACYT para la investigación básica, y el INALI. A través de este proyecto,
                    se investigó el tseltal hablado en 18 localidades, con especial enfoque en el habla de Petalcingo,
                    Bachajón, Guaquitepec, Cancuc, Tenejapa, Oxchuc y Villa Las Rosas. El producto de esta etapa fue
                    el <i>Diccionario multidialectal del tseltal: tseltal-español</i>, que se terminó de elaborar en 2015 y
                    salió
                    publicado en 2018 en coedicion INALI/CIESAS (véase pdf <a target="_blank"
                        href="https://www.academia.edu/44263742/Diccionario_multidialectal_del_tseltal_tseltal_espa%C3%B1ol">aquí</a>).
                    Este diccionario recibió el premio <i>Wigberto Jiménez Moreno 2019</i> por la

                    mejor investigación en el área de lingüística, otorgado por el Instituto Nacional de Antropología e
                    Historia. <br><br>
                    El registro del léxico tseltal no acabó con la publicación de ese diccionario, sino que se sigue
                    ampliando constantemente la base de datos, cubriendo más palabras en más regiones. Además, se está
                    ahora enriqueciendo el texto con imágenes y con audios de todas las palabras y ejemplos. <br><br>
                    El DiTseL se ideó para que el público en general tenga acceso a la base de datos conforme va
                    creciendo. En una etapa ulterior, se piensa desarrollar una interfaz para hacer posible la
                    participación
                    de usuarios externos al diccionario mismo, con la posibilidad de agregar palabras, completar
                    definiciones y ejemplos, o subir nuevos audios y fotos.
                </h3>
            </div>


            <hr>
        @endif


    </div>



@endsection
