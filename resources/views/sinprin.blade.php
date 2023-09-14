@if (isset($palabra->va))
    <h3>Variación impredecible: {!! $palabra->va !!}</h3>
@endif
<h3>{!! $palabra->psext !!}</h3>



@if (isset($palabra->lxdial))
    <h3>Se usa en: {!! $palabra->lxdial !!}</h3>

    @if (isset($palabra->cfdial))
        (véase → <a href="#otros">Otros lugares</a>)
    @endif
@endif


@if (isset($palabra->mor))
    <h3>Morfología: {!! $palabra->mor !!}
        @if (isset($palabra->morcom))
            ({!! $palabra->morcom !!} )
        @endif
    </h3>

@endif




@if (isset($palabra->et))
    <h3>{!! $palabra->et !!}</h3>
@endif

@if (isset($palabra->abst))
    <h3>Sustantivo abstracto: {!! $palabra->abst !!}</h3>
@endif

@if (isset($palabra->atr))
    <h3>Forma atributiva: {$palabra->atr}</h3>
@endif

@if (isset($palabra->inf))
    <h3>Infinitivo: {!! $palabra->inf !!}</h3>
@endif

@if (isset($palabra->nopos))
    <h3>Forma no poseída: {!! $palabra->nopos !!}</h3>
@endif

@if (isset($palabra->pl))
    <h3>Plural: {!! $palabra->pl !!}</h3>
@endif

@if (isset($palabra->plpos))
    <h3>Plural poseído: {!! $palabra->plpos !!}</h3>
@endif

@if (isset($palabra->pm))
    <h3>Posesión marcada: {!! $palabra->pm !!}</h3>
@endif

</div>

<br>


<?php
$cadena = $palabra->idsn;
$sn = 1;
$array = explode(';', $cadena);
?>

<ol style="padding-left: 10px;">
    @foreach ($array as $ar)
        @foreach ($sentidos as $sentido)
            @if ($ar == $sentido->id)
                <li id="sn{!! $sn++ !!}">
                    <h4>

                        @if (isset($sentido->sndial))
                            [{!! $sentido->sndial !!}]
                        @endif
                        <span style="color: black; background: #ffb27f; line-height: normal;" id="definicion">
                            {!! $sentido->de !!}
                        </span>
                    </h4>
                </li>

                <h4>{!! $sentido->sc !!}</h4>

                <div class="row">
                    @if (isset($sentido->pc1))
                        <div class="col-xs-4">
                            {{-- {{ -- <img src=" {{ asset('assets/imagenes  $sentido->pc1 !!') }}" alt="imagen" class="img-responsive"> --}}
                        </div>
                    @endif

                    @if (isset($sentido->pc2))
                        <div class="col-xs-4">
                            {{-- <img src="{{  asset('assets/imagenes!! $sentido->pc2 !!')    }}"  alt="imagen" class="img-responsive"> --}}
                        </div>
                    @endif

                    @if (isset($sentido->pc3))
                        <div class="col-xs-4">
                            {{-- {!!-- <img src="{!! asset('assets/imagenes{!! $sentido->pc3  !!}') !!}"  alt="imagen" class="img-responsive"> --!!} --}}
                        </div>
                    @endif
                </div>


                <?php
                $cadena2 = $sentido->exnum;
                $array2 = explode(';', $cadena2);
                ?>



                @foreach ($array2 as $ar2)
                    @foreach ($exnums as $exnum)
                        @if (isset($exnum->exnum))
                            @if ($ar2 == $exnum->exnum)
                                @if (isset($exnum->audio))
                                    @if (strpos($exnum->audio, 'http') === false)
                                        <audio src="../audios/{!! $exnum->audio !!}" id="player{!! $exnum->id !!}"
                                            type="audio/mpeg" preload="preload"></audio>

                                        <img src="{!! asset('imagenes/play.png') !!}" alt="play" id="audio"
                                            onclick="document.getElementById('player{!! $exnum->id !!}').play()">
                                    @else
                                        <audio src="{!! $exnum->audio !!}" id="player{!! $exnum->id !!}"
                                            type="audio/mpeg" preload="preload"></audio>

                                        <img src="{!! asset('imagenes/play.png') !!}" alt="play" id="audio"
                                            onclick="document.getElementById('player{!! $exnum->id !!}').play()">
                                    @endif
                                @endif


                                <h4>[{!! $exnum->xdial !!}] <span
                                        style="color: #2d7ac6">{!! $exnum->xv !!}</span> <span
                                        style="color: black">{!! $exnum->xe !!}</span></h4>
                            @endif
                        @endif
                    @endforeach
                @endforeach

                @if (isset($sentido->de2))
                    <h4>

                        ∎

                        @if (isset($sentido->sndial))
                            [{!! $sentido->sndial !!}]
                        @endif
                        <span style="color: black; background: #ffb27f4f; line-height: normal;" id="definicion">
                            {!! $sentido->de2 !!}
                        </span>
                    </h4>



                    <?php
                    $cadenados = $sentido->exnum2;
                    $arraydos = explode(';', $cadenados);
                    ?>



                    @foreach ($arraydos as $ardos)
                        @foreach ($exnums as $exnum)
                            @if (isset($exnum->exnum))
                                @if ($ardos == $exnum->exnum)
                                    @if (isset($exnum->audio))
                                        @if (strpos($exnum->audio, 'http') === false)
                                            <audio src="../audios/{!! $exnum->audio !!}" id="player{!! $exnum->id !!}"
                                                type="audio/mpeg" preload="preload"></audio>

                                            <img src="{!! asset('imagenes/play.png') !!}" alt="play" id="audio"
                                                onclick="document.getElementById('player{!! $exnum->id !!}').play()">
                                        @else
                                            <audio src="{!! $exnum->audio !!}" id="player{!! $exnum->id !!}"
                                                type="audio/mpeg" preload="preload"></audio>

                                            <img src="{!! asset('imagenes/play.png') !!}" alt="play" id="audio"
                                                onclick="document.getElementById('player{!! $exnum->id !!}').play()">
                                        @endif
                                    @endif


                                    <h4>[{!! $exnum->xdial !!}] <span
                                            style="color: #2d7ac6">{!! $exnum->xv !!}</span> <span
                                            style="color: black">{!! $exnum->xe !!}</span></h4>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                @endif

                @if (isset($sentido->de3))
                    <h4>

                        ∎
                        @if (isset($sentido->sndial))
                            [{!! $sentido->sndial !!}]
                        @endif
                        <span style="color: black; background: #ffb27f4f; line-height: normal;" id="definicion">
                            {!! $sentido->de3 !!}
                        </span>
                    </h4>

                    <?php
                    $cadena3 = $sentido->exnum3;
                    $array3 = explode(';', $cadena3);
                    ?>

                    @foreach ($array3 as $ar3)
                        @foreach ($exnums as $exnum)
                            @if ($ar3 == $exnum->exnum)
                                @if (isset($exnum->audio))
                                    @if (strpos($exnum->audio, 'http') === false)
                                        <audio src="../audios/{!! $exnum->audio !!}" id="player{!! $exnum->id !!}"
                                            type="audio/mpeg" preload="preload"></audio>

                                        <img src="{!! asset('imagenes/play.png') !!}" alt="play" id="audio"
                                            onclick="document.getElementById('player{!! $exnum->id !!}').play()">
                                    @else
                                        <audio src="{!! $exnum->audio !!}" id="player{!! $exnum->id !!}"
                                            type="audio/mpeg" preload="preload"></audio>

                                        <img src="{!! asset('imagenes/play.png') !!}" alt="play" id="audio"
                                            onclick="document.getElementById('player{!! $exnum->id !!}').play()">
                                    @endif
                                @endif


                                <h4>[{!! $exnum->xdial !!}] <span
                                        style="color: #2d7ac6">{!! $exnum->xv !!}</span> <span
                                        style="color: black">{!! $exnum->xe !!}</span></h4>
                            @endif
                        @endforeach
                    @endforeach
                @endif


                @if (isset($sentido->sy))
                    <h4>Sinónimo(s): {!! $sentido->sy !!}</h4>
                @endif
                @if (isset($sentido->sncf))
                    <h4>Véase: {!! $sentido->sncf !!}</h4>
                @endif
                @if (isset($sentido->sncfdial))
                    <h4>Otros lugares: {!! $sentido->sncfdial !!}</h4>
                @endif
            @endif
        @endforeach
    @endforeach

</ol>


<br>


@if (isset($palabra->cfdial))

    <h4 id="otros">Otros lugares:</h4>

    <?php
    $cadena4 = $palabra->cfdial;
    $array4 = explode(';', $cadena4);
    ?>

    @foreach ($array4 as $ar4)
        <h4>∎ {!! $ar4 !!}</h4>
    @endforeach

@endif


@if (isset($palabra->cf))
    <h4>Véase: {!! $palabra->cf !!}</h4>
@endif

@if (isset($palabra->phr))
    <h4>Aparece en la expresión siguiente: {!! $palabra->phr !!}</h4>
@endif

@if (isset($palabra->agn))
    <h4>Sustantivo de persona (agentivo): {!! $palabra->agn !!}</h4>
@endif

@if (isset($palabra->dif))
    <h4>Forma difusiva: {!! $palabra->dif !!}</h4>
@endif

@if (isset($palabra->sp))
    <h4>{!! $palabra->sp !!}</h4>
@endif

@if (isset($palabra->alisto))
    <h4>Más información sobre la variación dialectal de esta forma <a target="_blank"
            href="{!! $palabra->alisto !!}">aquí</a>.</h4>
@endif





@if (isset($palabra->morinv))
    <?php
    $morinvs = explode(';', $palabra->morinv);
    $numero = 0;
    $morinvas = null;
    ?>

    <h3>Es parte de:</h3>



    @foreach ($morinvs as $morinv)
        <?php
        $numero++;
        ?>

        @if ($numero <= 20)
            <button class="btn btn-default">{!! $morinv !!}</button>
        @else
            <?php
            $morinvas[] = $morinv;
            ?>
        @endif
    @endforeach
    @if ($morinvas != null)

        <div id="demo" class="collapse">
            @foreach ($morinvas as $morinv)
                <button class="btn btn-default">{!! $morinv !!}</button>
            @endforeach

        </div>
        <a type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Ver Más...</a>

    @endif
@endif
