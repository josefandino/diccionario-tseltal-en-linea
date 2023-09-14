<h3>{!! $palabra->gl !!}</h3>

<h3>
    @if (isset($palabra->lxdial))
        Se usa en: {!! $palabra->lxdial !!}
    @endif
    @if (isset($palabra->cfdial))
        (véase → <a href="#otros">Otros lugares</a>)
    @endif
</h3>


@if (isset($palabra->mor))
    <h3>Morfología: {!! $palabra->mor !!}
        @if (isset($palabra->morcom))
            ({!! $palabra->morcom !!} )
        @endif
    </h3>
@endif


@foreach ($dic as $dic)
    @if (rtrim($palabra->prin) == rtrim($dic->lxid))

        <h3>Variante de:</h3>
        <h2 style="color: #2d7ac6; margin-top: 10px;"><b>{!! $dic->lx !!}</b> <span
                style="font-size: medium; color: gray;">{!! $dic->hm !!} @if (isset($dic->phon))
                    [{!! $dic->phon !!}]
                @endif {!! $dic->sec !!}</span>


            @if (isset($dic->audio))
                @if (strpos($dic->audio, 'http') === false)
                    <audio src="../audios/{{ $dic->audio }}" id="player{{ $dic->id }}" type="audio/mpeg"
                        preload="preload"></audio>

                    <img src="{{ asset('assets/imagenes/play.png') }}" alt="play" id="audio-lema"
                        onclick="document.getElementById('player{{ $dic->id }}').play()">
                @else
                    <audio src="{{ $dic->audio }}" id="player{{ $dic->id }}" type="audio/mpeg"
                        preload="preload"></audio>

                    <img src="{{ asset('assets/imagenes/play.png') }}" alt="play" id="audio-lema"
                        onclick="document.getElementById('player{{ $dic->id }}').play()">
                @endif
            @endif

        </h2>

        <div style="background: #dbdbdb; padding: 10px; padding-top: 1px;">
            <h3>{!! $dic->predva !!}</h3>

            @if (isset($dic->va))
                <h4>Variación impredecible: {!! $dic->va !!}</h4>
            @endif

            <h4> {!! $dic->psext !!}</h4>







            <h4>
                @if (isset($dic->lxdial))
                    Se usa en: {!! $dic->lxdial !!}
                @endif
                @if (isset($dic->cfdial))
                    (véase → <a href="#otros">Otros lugares</a>)
                @endif
            </h4>


            @if (isset($dic->mor))
                <h4>Morfología:
                    {!! $dic->mor !!}
                    @if (isset($dic->morcom))
                        ({!! $dic->morcom !!} )
                    @endif
                </h4>
            @endif



            @if (isset($dic->et))
                <h4>{!! $palabra->et !!}</h4>
            @endif

            @if (isset($dic->abst))
                <h4>Sustantivo abstracto: {!! $dic->abst !!}</h4>
            @endif

            @if (isset($dic->atr))
                <h4>Forma atributiva: {!! $dic->atr !!}</h4>
            @endif

            @if (isset($dic->inf))
                <h4>Infinitivo: {!! $dic->inf !!}</h4>
            @endif

            @if (isset($dic->nopos))
                <h4>Forma no poseída: {!! $dic->nopos !!}</h4>
            @endif

            @if (isset($dic->pl))
                <h4>Plural: {!! $dic->pl !!}</h4>
            @endif

            @if (isset($dic->plpos))
                <h4>Plural poseído: {!! $dic->plpos !!}</h4>
            @endif

            @if (isset($dic->pm))
                <h4>Posesión marcada: {!! $dic->pm !!}</h4>
            @endif


        </div>

        <?php
        $cadena = $dic->idsn;
        $array = explode(';', $cadena);
        $sn = 1;
        ?>

        <ol style="padding-left: 10px;">
            @foreach ($array as $ar)
                @foreach ($sentidos as $sentido)
                    @if ($ar == $sentido->id)
                        <li id="sn{{ $sn++ }}">
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
                                    <img src="../../imagenes/{!! $sentido->pc1 !!}" alt="imagen"
                                        class="img-responsive">
                                </div>
                            @endif

                            @if (isset($sentido->pc2))
                                <div class="col-xs-4">
                                    <img src="../../imagenes/{!! $sentido->pc2 !!}" alt="imagen"
                                        class="img-responsive">
                                </div>
                            @endif

                            @if (isset($sentido->pc3))
                                <div class="col-xs-4">
                                    <img src="../../imagenes/{!! $sentido->pc3 !!}" alt="imagen"
                                        class="img-responsive">
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
                                                <audio src="../audios/{{ $exnum->audio }}"
                                                    id="player{{ $exnum->id }}" type="audio/mpeg"
                                                    preload="preload"></audio>

                                                <img src="{{ asset('assets/imagenes/play.png') }}" alt="play"
                                                    id="audio"
                                                    onclick="document.getElementById('player{{ $exnum->id }}').play()">
                                            @else
                                                <audio src="{{ $exnum->audio }}" id="player{{ $exnum->id }}"
                                                    type="audio/mpeg" preload="preload"></audio>

                                                <img src="{{ asset('assets/imagenes/play.png') }}" alt="play"
                                                    id="audio"
                                                    onclick="document.getElementById('player{{ $exnum->id }}').play()">
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
                                                    <audio src="../audios/{{ $exnum->audio }}"
                                                        id="player{{ $exnum->id }}" type="audio/mpeg"
                                                        preload="preload"></audio>

                                                    <img src="{{ asset('assets/imagenes/play.png') }}" alt="play"
                                                        id="audio"
                                                        onclick="document.getElementById('player{{ $exnum->id }}').play()">
                                                @else
                                                    <audio src="{{ $exnum->audio }}" id="player{{ $exnum->id }}"
                                                        type="audio/mpeg" preload="preload"></audio>

                                                    <img src="{{ asset('assets/imagenes/play.png') }}" alt="play"
                                                        id="audio"
                                                        onclick="document.getElementById('player{{ $exnum->id }}').play()">
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
                                                <audio src="../audios/{{ $exnum->audio }}" controls="controls"
                                                    type="audio/mpeg" preload="preload"></audio>
                                            @else
                                                <audio src="{{ $exnum->audio }}" controls="controls" type="audio/mpeg"
                                                    preload="preload"></audio>
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


        @if (isset($dic->cfdial))
            <h4 id="otros">Otros lugares:</h4>

            <?php
            $cadena4 = $dic->cfdial;
            $array4 = explode(';', $cadena4);
            ?>

            @foreach ($array4 as $ar4)
                <h4>∎ {!! $ar4 !!}</h4>
            @endforeach
        @endif


        @if (isset($dic->cf))
            <h4>Véase: {!! $dic->cf !!}</h4>
        @endif

        @if (isset($dic->phr))
            <h4>Aparece en la expresión siguiente: {!! $dic->phr !!}</h4>
        @endif

        @if (isset($dic->agn))
            <h4>Sustantivo de persona (agentivo): {!! $dic->agn !!}</h4>
        @endif

        @if (isset($dic->dif))
            <h4>Forma difusiva: {!! $dic->dif !!}</h4>
        @endif

        @if (isset($dic->sp))
            <h4>{{ $dic->sp }}</h4>
        @endif

        @if (isset($dic->alisto))
            <h4>Más información sobre la variación dialectal de esta forma <a target="_blank"
                    href="{{ $dic->alisto }}">aquí</a>.</h4>
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
                    <button class="btn btn-default">{{ $morinv }}</button>
                @else
                    <?php
                    $morinvas[] = $morinv;
                    ?>
                @endif
            @endforeach




            @if ($morinvas != null)
                <a type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Ver Más...</a>
                <div id="demo" class="collapse">
                    @foreach ($morinvas as $morinv)
                        <button class="btn btn-default">{!! $morinv !!}</button>
                    @endforeach

                </div>
            @endif
        @endif


    @endif
@endforeach
