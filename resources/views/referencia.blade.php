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


  <h2>REFERENCIAS</h2>
  <p>Datos archivo REFERENCIAS.txt: ({{ count($referencias) }} registros)</p>                                          
  <table class="table table-striped table-bordered table-hover table-condensed">
    <thead>
      <tr>
        <th>REFID</th>
        <th>AUTHOR</th>
        <th>YEAR</th>
        <th>TITLE</th>
        <th>PUB</th>
        <th>NT</th>
      </tr>
    </thead>
    <tbody>
      @foreach($referencias as $referencia)
      <tr>
        <td>{{ $referencia->refid }} </td>
        <td>{{ $referencia->author }} </td>
        <td>{{ $referencia->year }} </td>
        <td>{{ $referencia->title }} </td>
        <td>{{ $referencia->pub }} </td>
        <td>{{ $referencia->nt }} </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
