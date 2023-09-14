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


   <h2>SENTIDOS</h2>
  <p>Datos archivo SENTIDOS.txt: {{ count($sentidos) }}  </p> 

  <table class="table table-striped table-bordered table-hover table-condensed">
    <thead>
      <tr>

        <th>IDSN</th>
        <th>SNDIAL</th>
        <th>DE</th>
        <th>PC</th>
        <th>PC1</th>
        <th>PC2</th>
        <th>PC3</th>
        <th>SC</th>
        <th>EXNUM</th>
        <th>DE2</th>
        <th>EXNUM2</th>
        <th>DE3</th>
        <th>EXNUM3</th>
        <th>SY</th>
        <th>SNCF</th>
        <th>SNCFDIAL</th>
        
      </tr>
    </thead>
    <tbody>
  

      @foreach($sentidos as $sentido)


      <tr>

        <td>{{ $sentido->idsn }} </td>
        <td>{{ $sentido->sndial }} </td>
        <td>{{ $sentido->de }} </td>
        <td>{{ $sentido->pc }} </td>
        <td>{{ $sentido->pc1 }} </td>
        <td>{{ $sentido->pc2 }} </td>
        <td>{{ $sentido->pc3 }} </td>
        <td>{{ $sentido->sc }} </td>

        <?php
            $cadena = $sentido->exnum;
            $array = explode(";", $cadena);
        ?>
        

         <td>
        @foreach($array as $ar)
          
          {{ $ar }}
          
          {{--  
          @foreach($exnums as $exnum)
  

          @if($ar == $exnum->exnum)
              {{ $exnum->xe }} <br>
          @endif

          @endforeach
          --}}
          
        @endforeach

        
       </td>

       <td>{{ $sentido->de2 }} </td>
       <td>{{ $sentido->exnum2 }} </td>
       <td>{{ $sentido->de3 }} </td>
       <td>{{ $sentido->exnum3 }} </td>
       <td>{{ $sentido->sy }} </td>
       <td>{{ $sentido->sncf }} </td>
       <td>{{ $sentido->sncfdial }} </td>




        

      </tr>
      @endforeach
    </tbody>
  </table>

</div>

@endsection
