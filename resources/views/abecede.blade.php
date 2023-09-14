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
    <div class="column-container">
        @foreach ($dic as $base)
            @if (strlen($base->lx) >= 1)
                <?php

                if (substr($base->lx, 0, 3) == '–') {
                    $base->lx = str_replace(substr($base->lx, 0, 3), '-', $base->lx);
                }

                ?>

                <a href="{{ route('aplicacion', $base->lxid) }}">
                    <p>
                        <b>{!! $base->lx !!}</b>
                        @if (isset($base->hm))
                            {!! $base->hm !!}
                        @endif
                        @if (isset($base->ps))
                            (<i>{{ $base->ps }}</i>)
                        @endif
                        @if (isset($base->min))
                            : {{ $base->min }}
                        @endif
                    </p>
                </a>
            @endif
        @endforeach
    </div>
@endsection
