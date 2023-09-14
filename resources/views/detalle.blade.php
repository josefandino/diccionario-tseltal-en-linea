@extends('layouts.app')

@section('css')
<style>
    .fixed-panel {
        max-height: 360px;
        overflow-y: scroll;
    }

    #audio {
        width: 30px;
        float: right;
        border-radius: 10px;
    }

    #audio-lema {
        width: 30px;
    }

    #definicion a {
        color: #009db7;
    }

    #localidad {
        color: #306a1b;
    }

    .btn {
        margin: 5px;
    }

    @media only screen and (max-width: 990px) {
        #audio {
            margin-top: 0px;
        }
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


<div class="row" style="padding-right: 15px; padding-left: 15px;">

    <div class="col-sm-3 hidden-xs" style="margin-top: 20px;">
        <h4><u>Ver También</u>:</h4>


        <div class="panel panel-default">
            <div class="panel-body fixed-panel" style="padding: 2px;">
                @foreach ($dic as $palabrita)
                <a href="{{ route('aplicacion', $palabrita->lxid) }}">
                    <h5>{{ $palabrita->lx }} <sup>{!! $palabrita->hm !!}</sup> ({{ $palabrita->ps }}):
                        {{ $palabrita->min }}</h5>
                </a>
                @endforeach
            </div>
        </div>




    </div>


    <div class="col-sm-9" style="font-weight: initial;">

        @if (isset($palabra->prin))

        <h3 style="font-size: x-large;"><b>{{ $palabra->lx }}</b> <span style="font-size: medium;">{!! $palabra->hm !!}
                @if (isset($palabra->phon))
                [{!! $palabra->phon !!}]
                @endif {!! $palabra->sec !!}</span>

            @if (isset($palabra->audio))
            @if (strpos($palabra->audio, 'http') === false)
            <audio src="../audios/{{ $palabra->audio }}" id="player{{ $palabra->id }}" type="audio/mpeg"
                preload="preload"></audio>

            <img src="{{ asset('imagenes/play.png') }}" alt="play" id="audio-lema"
                onclick="document.getElementById('player{{ $palabra->id }}').play()">
            @else
            <audio src="{{ $palabra->audio }}" id="player{{ $palabra->id }}" type="audio/mpeg"
                preload="preload"></audio>

            <img src="{{ asset('imagenes/play.png') }}" alt="play" id="audio-lema"
                onclick="document.getElementById('player{{ $palabra->id }}').play()">
            @endif
            @endif

        </h3>


        <h3>{!! $palabra->predva !!}</h3>
        @else
        <h2 style="color: #2d7ac6;">{{ $palabra->lx }} <span style="font-size: medium; color: gray;">{!! $palabra->hm
                !!} @if (isset($palabra->phon))
                [{!! $palabra->phon !!}]
                @endif {!! $palabra->sec !!}</span>

            @if (isset($palabra->audio))
            @if (strpos($palabra->audio, 'http') === false)
            <audio src="../audios/{{ $palabra->audio }}" id="player{{ $palabra->id }}" type="audio/mpeg"
                preload="preload"></audio>

            <img src="{{ asset('imagenes/play.png') }}" alt="play" id="audio-lema"
                onclick="document.getElementById('player{{ $palabra->id }}').play()">
            @else
            <audio src="{{ $palabra->audio }}" id="player{{ $palabra->id }}" type="audio/mpeg"
                preload="preload"></audio>

            <img src="{{ asset('imagenes/play.png') }}" alt="play" id="audio-lema"
                onclick="document.getElementById('player{{ $palabra->id }}').play()">
            @endif
            @endif

        </h2>


        <div style="background: #dbdbdb; padding: 10px; padding-top: 1px;">
            <h3>{!! $palabra->predva !!}</h3>


            @endif

            @if (isset($palabra->prin))
                @include('prin')
            @else
                @include('sinprin')
            @endif

        </div>
    </div>

    @foreach ($referencias as $referencia)
    <!-- referencia -->
    <div id="{{ $referencia->refid }}" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal contenido-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">REFERENCIA</h4>
                </div>
                <div class="modal-body">
                    <p>{{ $referencia->author }}. {{ $referencia->year }}. {{ $referencia->title }}.
                        {{ $referencia->pub }}.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>
    @endforeach

    @endsection
