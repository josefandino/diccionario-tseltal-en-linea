@extends('layouts.app')

@section('menuabc')
    @include('layouts.menuabc')
@endsection

@section('busqueda')
    @include('layouts.espanol')
@endsection


@section('content')

<div class="text-center" style="margin: 20px;">
    <div class="text-center" style="padding: 20px; line-height: 25px; font-weight: initial;">

        <div class="row">


            <div class="col-md-12">
                <div class="">
                    <h1 style="font-size: 500%;">DITSEL</h1>
                    <h1>Diccionario Tseltal en Línea</h1>
                    <p>Creado en 2019 y constantemente actualizado, este diccionario tseltal-español es una versión
                        ampliada y con contenido multimedia agregado del <a
                            href="https://ditsel.aldelim.org/antecedentes">Diccionario Multidialectal del Tseltal</a>
                        (Polian 2018), descargable en pdf <a
                            href="https://www.academia.edu/44263742/Diccionario_multidialectal_del_tseltal_tseltal_espa%C3%B1ol">aquí</a>.
                        Está basado en más de 15 años de <a
                            href="https://documentaciontseltal.aldelim.org/documentacion.html" target="_blank">documentación
                            lingüística</a> realizada desde el Centro de Documentación del Tseltal a partir de 2006.
                        Cubre
                        en profundidad el léxico del tseltal en buena parte de su diversidad dialectal, e incluye
                        información sobre morfología, etimología y expresiones usuales. La creación de esta
                        plataforma fue posible gracias a una <a href="https://ditsel.aldelim.org/donativos">campaña de
                            donativos</a> llevada a cabo en 2019.</p>

                    <h3>Coordinador: <a href="https://documentaciontseltal.aldelim.org/equipo/gilles.html"
                            target="_blank">Gilles Polian</a></h3>
                    <h3>Equipo de colaboradoras y colaboradores: <a href="https://ditsel.aldelim.org/colaboradores">véase
                            aquí</a>.</h3>

                    <h3>El DiTseL contiene ahora: <br>- <b>12,650 entradas</b> (1,264 con audio). <br>
                        - <b>12,768 ejemplos</b> (9,031 con audio). <br>
                        - <b>1,425 imágenes</b> (fotos y dibujos).</h3>

                </div>

            </div>


        </div>


    </div>
@endsection
