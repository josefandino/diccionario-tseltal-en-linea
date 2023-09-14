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
                        <h1 style="font-size: 300%;">DONATIVOS</h1>

                    </div>
                </div>
            </div>

            <div class="row" id="donativos">
                <div class="">
                    <h2><b>Campaña solidaria de donativos</b></h2>
                    <h3>La conversión de libro impreso a diccionario electrónico fue posible gracias a una campaña
                        de donativos que se realizó del 31 de mayo al 19 de agosto del 2019. Esta campaña se llamó
                        "<a href="https://www.goteo.org/project/un-diccionario-en-linea-para-el-idioma-maya-tselta"
                            target="_blank">Un diccionario en línea para el idioma maya tseltal</a>", a través de la
                        plataforma de la
                        Fundación Goteo. Se juntaron de esta forma € 5,382 euros (aproximativamente 110,000 pesos
                        mexicanos) por parte de 81 donadores. Esta cantidad es la que permitió el lanzamiento del
                        portal del DiTseL.
                    </h3>

                </div>

                <br>

                <div class="row">

                    <div class="row" style="font-size: 18px;">
                        <div class="col-md-3 col-md-offset-3">
                            Davy Trop <br>
                            Alain Polian <br>
                            Patricia Cabredo <br>
                            Marcos Grimsditch <br>
                        </div>
                        <div class="col-md-4">
                            Nicole Polian <br>
                            Jan y Diane Rus <br>
                            Aurore Monod-Becquelin <br>
                            Eric Polian <br>
                        </div>

                    </div>

                </div>
                <hr>

                <div class="row" style="font-size: 16px;">
                    <div class="col-md-4">
                        Claude Polian <br>
                        Susan Kung <br>
                        Jessica Coon <br>
                        Marianne Maître <br>
                        Helda Morales <br>
                        Marie Chosson <br>
                        Gontzal Mz. de la Hidalga <br>
                        Paulina Morán Espinosa <br>
                        Gabriela Garrido <br>
                        Ann Clarke <br>
                        Danielle Canceill <br>
                    </div>
                    <div class="col-md-4">
                        Livio Tilatti <br>
                        Penelope Brown <br>
                        Louanna Furbee <br>
                        Judith Aissen <br>
                        Christian Métairie <br>
                        Begoña Elizari <br>
                        Heidi Anna Johnson <br>
                        Iñigo Ruiz <br>
                        Brigitte Rozoy <br>
                        Andrea Gauzzi <br>
                        Thomas Baumann <br>
                    </div>

                    <div class="col-md-4">
                        Igor Remolar <br>
                        Georges Polian <br>
                        Dominique Beauchamps <br>
                        Marisa Casillas Tice <br>
                        Linda Abarbanell <br>
                        Denis Cheniot <br>
                        Laure de Saint Phalle <br>
                        John Burstein <br>
                        Olivier Lauth <br>
                        Sylvie Cheniot <br>
                        Liliana Espinosa Sandoval <br>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        Peter Rosset <br>
                        Mohan Ambikaipaker <br>
                        Justin Royer <br>
                        Jean-Claude Chervin <br>
                        Pierre Frenkiel <br>
                        Ana Moureau <br>
                        Dominique Adam <br>
                    </div>
                    <div class="col-md-4">

                        Olivier Le Guen <br>
                        Elsa Mocquet <br>
                        Ryan Bennett <br>
                        Isabel Castillo <br>
                        Aurélien Pinceaux <br>
                        Luc Marcus <br>
                        Françoise Gladieux <br>

                    </div>

                    <div class="col-md-4">
                        Frédéric Decremps <br>
                        Susanna Rostas <br>
                        Verónica Vázquez Soto <br>
                        Sebastian Winnen <br>
                        Annie Leredde <br>
                        Francine Dujardin <br>
                        Anne Dominique Dalodé <br>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        Ana Gabriela Blanco <br>
                        Vivian Newdick <br>
                        Fabrizio Mas <br>
                        Mehdy Belabbas <br>
                    </div>

                    <div class="col-md-3">
                        Adeline Gargouil <br>
                        Violette Diaz <br>
                        Florent Chedreau <br>
                        Richard Stahler-Sholk <br>
                        Felipe de Jesús García Champo <br>
                    </div>

                    <div class="col-md-3">
                        Lise Kovienski <br>
                        Catherine Giudicelli <br>
                        Isabelle Bordier <br>
                        Ramón Zacarías <br>
                        Anne de Saint Phalle <br>
                    </div>

                    <div class="col-md-3">
                        Julio Pellicer <br>
                        Thierry du Crest <br>
                        Begoña Solchaga <br>
                        Jorge Santiago <br>
                    </div>

                </div>
                <hr>
                <div class="row">
                    <h3>Agradecemos también a las personas que han ayudado en la preparación de la campaña:</h3>
                    <p>
                        Rosaluz Pérez Espinosa <br>
                        Cecilia Monroy <br>
                        Sylvie Lapointe <br>
                        Natalia Arcos Salvo <br>
                        Alessandro Zagato
                    </p>
                </div>

            </div>


            <hr>
        @endif


    </div>
@endsection
