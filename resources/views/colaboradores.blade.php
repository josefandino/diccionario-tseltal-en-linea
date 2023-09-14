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
                         <h1 style="font-size: 300%;">COLABORADORES</h1>

                     </div>

                 </div>


             </div>





             <div class="" id="colaboradores" style="text-align: justify;">
                 <h2><b>Personas que han colaborado en la investigación</b></h2>

                 <table class="table">

                     <tr>
                         <td>Aguilar Méndez, Sebastián</td>
                         <td>Lexicografía general; recopilación/corrección para Guaquitepec</td>
                     </tr>

                     <tr>
                         <td>Cruz Gómez, Ángela Lorena</td>
                         <td>Recopilación/corrección para Yajalón</td>
                     </tr>

                     <tr>
                         <td>Cruz Méndez, Oscar Gregorio</td>
                         <td>Lexicografía general; recopilación/corrección para Petalcingo</td>
                     </tr>

                     <tr>
                         <td>Gómez López, Tomás</td>
                         <td>Lexicografía general; recopilación/corrección para Villa Las Rosas</td>
                     </tr>

                     <tr>
                         <td>Gómez Pérez, Alberto</td>
                         <td>Recopilación/corrección para Petalcingo</td>
                     </tr>

                     <tr>
                         <td>Gómez Sánchez, María de Jesús</td>
                         <td>Recopilación/corrección para Oxchuc</td>
                     </tr>

                     <tr>
                         <td>Gutiérrez Gómez, Alberto </td>
                         <td>Recopilación/corrección para Bachajón</td>
                     </tr>

                     <tr>
                         <td>López Gómez, Catalina</td>
                         <td>Recopilación/corrección para Amatenango</td>
                     </tr>

                     <tr>
                         <td>López Intzín, Juan (Xuno)</td>
                         <td>Lexicografía general; recopilación/corrección para Tenejapa</td>
                     </tr>

                     <tr>
                         <td>Malaret, Luis</td>
                         <td>Recolección e identificación de especies de animales y plantas </td>
                     </tr>

                     <tr>
                         <td>Méndez Girón, Juan</td>
                         <td>Recopilación/corrección para Tenejapa</td>
                     </tr>

                     <tr>
                         <td>Méndez Sánchez, José Antonio</td>
                         <td>Edición de audios</td>
                     </tr>

                     <tr>
                         <td>Métairie, Christian</td>
                         <td>Diseño de programas informáticos para el manejo de la base de datos</td>
                     </tr>

                     <tr>
                         <td>Pérez González, Jaime</td>
                         <td>Lexicografía general; recopilación/corrección para Tenango y Petalcingo</td>
                     </tr>

                     <tr>
                         <td>Polian, Nicole</td>
                         <td>Diseño de programas informáticos para el manejo de la base de datos</td>
                     </tr>

                     <tr>
                         <td>Sántiz Girón, Antonia</td>
                         <td>Recopilación/corrección para Tenejapa </td>
                     </tr>

                     <tr>
                         <td>Sántiz Gómez, Roberto </td>
                         <td>Recopilación/corrección para Oxchuc</td>
                     </tr>

                     <tr>
                         <td>Silvano Jiménez, Miguel</td>
                         <td>Lexicografía general; recopilación/corrección para Bachajón</td>
                     </tr>

                     <tr>
                         <td>Vázquez Castellanos, Manuel </td>
                         <td>Recopilación/corrección para Cancuc</td>
                     </tr>

                 </table>


             </div>
             <br>
             <div class="" style="text-align: justify;">
                 <h3><u><b>Biólogos/geólogos consultados para la identificación de especies y rocas:</b></u></h3>
                 <ul>
                     <li><i>Botánica:</i> Mario Ishiki Ishihara (ECOSUR: El Colegio de la Frontera Sur)</li>
                     <li><i>Entomología:</i> Benigno Gómez, Remy Vandame (ECOSUR)</li>
                     <li><i>Geología y petrología:</i> Juan José Peral Lozano</li>
                     <li><i>Herpetología:</i> Luis Antonio Muñoz Alonso (ECOSUR)</li>
                     <li><i>Ictiología:</i> Alfonso González Díaz, Rocío Rodiles Hernández (ECOSUR)</li>
                     <li><i>Mastozoología:</i> Jorge Bolaños Citalán (ECOSUR)</li>
                     <li><i>Micología:</i> William García Santiago</li>
                     <li><i>Ornitología:</i> Luis Guillermo Mena Domínguez</li>
                 </ul>
             </div>


             <hr>


             <hr>
         @endif


     </div>



 @endsection
