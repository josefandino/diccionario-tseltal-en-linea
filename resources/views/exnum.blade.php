 @extends('layouts.app')

@section('content') 

<div class="container">

  @if(\Session::has('message'))
            <div class="alert alert-info alert-dismissible text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h2><strong><i class="fa fa-info-circle"></i></strong> {{ \Session::get('message') }}</h2>
            </div>
  @endif


  <h2>EXNUM</h2>
  <p>Datos archivo EXNUM.txt: ({{ count($exnums) }} registros)</p>                                          
  <table class="table table-striped table-bordered table-hover table-condensed">
    <thead>
      <tr>
        <th>EXNUM</th>
        <th>XV</th>
        <th>XDIAL</th>
        <th>XE</th>
        <th>AUDIO</th>
      </tr>
    </thead>
    <tbody>
      @foreach($exnums as $exnum)
      <tr>
        <td>{{ $exnum->exnum }} </td>
        <td>{{ $exnum->xv }} </td>
        <td>{{ $exnum->xdial }} </td>
        <td>{{ $exnum->xe }} </td>
        <td>{{ $exnum->audio }} </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
