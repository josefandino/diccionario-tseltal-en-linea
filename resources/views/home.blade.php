@extends('layouts.app')

@section('content')
<div class="">
    <div class="row">
        @if(\Session::has('message'))
            <div class="alert alert-info alert-dismissible text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h2><strong><i class="fa fa-info-circle"></i></strong> {{ \Session::get('message') }}</h2>
            </div>
        @endif
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Archivos DIC.txt  para base de datos</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="links">
                        <h5>Suba archivo DIC.txt para base de datos:</h5>
                        <form method="post" action="{{url('dic_data')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="file" name="dic">
                            <br><br>
                            <input type="submit" value="Enviar" style="padding: 10px 20px;">
                        </form>

                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Archivos EXNUM.txt  para base de datos</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="links">
                        <h5>Suba archivo EXNUM.txt para base de datos:</h5>
                        <form method="post" action="{{url('exnum_data')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="file" name="exnum">
                            <br><br>
                            <input type="submit" value="Enviar" style="padding: 10px 20px;">
                        </form>

                    </div>
                </div>

            </div>
        </div>


        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Archivos SENTIDOS.txt  para base de datos</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="links">
                        <h5>Suba archivo SENTIDOS.txt para base de datos:</h5>
                        <form method="post" action="{{url('sentido_data')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="file" name="sentido">
                            <br><br>
                            <input type="submit" value="Enviar" style="padding: 10px 20px;">
                        </form>

                    </div>
                </div>

            </div>
        </div>


        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Archivos REFERENCIAS.txt  para base de datos</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="links">
                        <h5>Suba archivo REFERENCIAS.txt para base de datos:</h5>
                        <form method="post" action="{{url('referencia_data')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="file" name="referencia">
                            <br><br>
                            <input type="submit" value="Enviar" style="padding: 10px 20px;">
                        </form>

                    </div>
                </div>

            </div>
        </div>




        <div class="col-md-6">

            <div class="panel panel-default">
                <div class="panel-heading">Imágenes</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="links">
                        <h5>Suba sus imágenes para base de datos:</h5>
                         <a href="{{ asset('image') }}"><button class="btn btn-primary btn-block">Subir Imágenes</button></a>

                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-6">

            <div class="panel panel-default">
                <div class="panel-heading">Audios</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="links">
                        <h5>Suba sus archivos de audio para base de datos:</h5>
                         <a href="{{ asset('file') }}"><button class="btn btn-primary btn-block">Subir Audios</button></a>

                    </div>
                </div>

            </div>
        </div>




    </div>
</div>
@endsection

