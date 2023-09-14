<?php

namespace App\Http\Controllers;

use App\Models\Abecedario;
use App\Models\Dic;
use App\Models\Exnum;
use App\Models\Referencia;
use App\Models\Sentido;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbecedarioController extends Controller
{
    public function index()
    {
        $abecedario = Abecedario::all();
        return view('index', compact('abecedario'));
    }
    public function espanol()
    {
        $abecedario = Abecedario::all();
        return view('espanol', compact('abecedario'));
    }

    public function donativos()
    {
        $abecedario = Abecedario::all();
        return view('donativos', compact('abecedario'));
    }

    public function antecedentes()
    {
        $abecedario = Abecedario::all();
        return view('antecedentes', compact('abecedario'));
    }

    public function colaboradores()
    {
        $abecedario = Abecedario::all();
        return view('colaboradores', compact('abecedario'));
    }

    public function abededarioSelecionada($letra)
    {
        $abecedario = Abecedario::all();

        $dic = Dic::where('lx', 'LIKE', $letra . '%')
            ->orderBy('ly', 'ASC')
            ->orderBy('hm', 'ASC')
            ->get();

        return view('abecede', compact('abecedario', 'dic'));
    }

    public function ver($lxid)
    {
        $abecedario = Abecedario::all();
        $palabra = Dic::where('lxid', $lxid)->first();
        $entrada = substr($palabra->lx, 0, 3);
        if (substr($palabra->lx, 0, 3) == '–') {
            $entrada = '–';
        }
        $dic = Dic::where('lx', "LIKE", $entrada . '%')
            ->orderBy('ly', 'ASC')
            ->orderBy('hm', 'ASC')
            ->get();

        $sentidos = Sentido::all();
        $exnums = Exnum::all();
        $referencias = Referencia::all();
        return view('detalle')
            ->with(compact('abecedario'))
            ->with(compact('palabra'))
            ->with(compact('dic'))
            ->with(compact('sentidos'))
            ->with(compact('exnums'))
            ->with(compact('referencias')
        );
    }


    function tseltal_fetch(Request $request)
    {

        if ($request->get('query')) {
            $query = $request->get('query');
            $data = DB::table('dics')
                ->where('lx', 'like', "$query%")
                ->get();

            if ($data->count() > 0) {
                $output = '<ul class="dropdown-menu" style="display:block; position:relative;width:100%;">';
                foreach ($data as $row) {
                    $output .= '
                        <li><a class="dropdown-item" href="' . route('aplicacion', $row->lxid) . '">'
                        . $row->lx . ' (' .$row->ps.')' . ' : '. $row->min .
                        '</a></li>
                    ';
                }
                $output .= '</ul>';
                echo $output;
            } else {
                // No hay coincidencias, no se muestra la lista
            }
        }
    }


    function espanol_fetch(Request $request)
    {

        if ($request->get('query')) {
            $query = $request->get('query');
            $data = DB::table('dics')
                ->where('min', 'like', "$query%")
                ->get();

            if ($data->count() > 0) {
                $output = '<ul class="dropdown-menu" style="display:block; position:relative;width:100%;">';
                foreach ($data as $row) {
                    $output .= '
                        <li><a class="dropdown-item" href="' . route('aplicacion', $row->lxid) . '">'
                        . $row->min . ' '.$row->lx .
                        '</a></li>
                    ';
                }
                $output .= '</ul>';
                echo $output;
            } else {
                // No hay coincidencias, no se muestra la lista
            }
        }
    }


    public function img_data(Request $request)
    {

        $path = public_path() . '/imagenes/';
        $file = $request->img;
        $fileName = $file->getClientOriginalName();
        $file->move($path, $fileName);

        return redirect()->route('home')->with('message', 'Imagen subida con exito');
    }

    public function exnum_data(Request $request)
    {


        $contenido = File::get($request->exnum);





        // dd($contenido);

        Exnum::truncate();

        $pieces = explode("\r\n\r\n", $contenido);

        // dd($pieces);



        foreach ($pieces as $linea) {

            $line[] = explode("\r\n", $linea);

            //$line = str_replace("\r\n", "", $line);

        }

        //  dd($line);

        foreach ($line as $fila) {

            $resultado1 = NULL;
            $resultado2 = NULL;
            $resultado3 = NULL;
            $resultado4 = NULL;
            $resultado5 = NULL;

            // dd($fila);
            foreach ($fila as $row) {


                if (strpos($row, 'exnum ')) {

                    $resultado1 = str_replace('\exnum ', "", $row);
                }

                if (strpos($row, 'xv ')) {

                    $resultado2 = str_replace('\xv ', "", $row);
                }

                if (strpos($row, 'xdial ')) {

                    $resultado3 = str_replace('\xdial ', "", $row);
                }

                if (strpos($row, 'xe ')) {

                    $resultado4 = str_replace('\xe ', "", $row);
                }

                if (strpos($row, 'audio ')) {

                    $resultado5 = str_replace('\audio ', "", $row);
                }
            }


            // dd($resultado6);


            $contents[] = array('exnum' => $resultado1, 'xv' => $resultado2, 'xdial' => $resultado3, 'xe' => $resultado4, 'audio' => $resultado5);
        }

        // dd($contents);

        foreach ($contents as $key => $value) {

            $exnum = new Exnum();
            $exnum->exnum = $value['exnum'];
            $exnum->xv = $value['xv'];
            $exnum->xdial = $value['xdial'];
            $exnum->xe = $value['xe'];
            $exnum->audio = $value['audio'];
            $exnum->save();
        }

        if ($exnum->save()) {
            return redirect()->route('exnum')->with('message', 'El archivo fue agregado CORRECTAMENTE');
        } else {
            return redirect()->route('home')->with('message', 'OCURRIO UN ERROR');
        }
    }

    public function dic_data(Request $request)
    {




        $contenido = File::get($request->dic);

        // dd($contenido);

        Dic::truncate();

        $pieces = explode("\r\n\r\n", $contenido);

        // dd($pieces);



        foreach ($pieces as $linea) {

            $line[] = explode("\r\n", $linea);

            //$line = str_replace("\r\n", "", $line);

        }

        //  dd($line);

        foreach ($line as $fila) {

            $resultado1 = NULL;
            $resultado2 = NULL;
            $resultado3 = NULL;
            $resultado4 = NULL;
            $resultado5 = NULL;
            $resultado6 = NULL;
            $resultado7 = NULL;
            $resultado8 = NULL;
            $resultado9 = NULL;
            $resultado10 = NULL;
            $resultado11 = NULL;
            $resultado12 = NULL;
            $resultado13 = NULL;
            $resultado14 = NULL;
            $resultado15 = NULL;
            $resultado16 = NULL;
            $resultado17 = NULL;
            $resultado18 = NULL;
            $resultado19 = NULL;
            $resultado20 = NULL;
            $resultado21 = NULL;
            $resultado22 = NULL;
            $resultado23 = NULL;
            $resultado24 = NULL;
            $resultado25 = NULL;
            $resultado26 = NULL;
            $resultado27 = NULL;
            $resultado28 = NULL;
            $resultado29 = NULL;
            $resultado30 = NULL;
            $resultado31 = NULL;
            $resultado32 = NULL;
            $resultado33 = NULL;
            $resultado34 = NULL;

            $resultado35 = NULL;

            // dd($fila);
            foreach ($fila as $row) {


                if (strpos($row, 'lxid-1 ')) {

                    $resultado1 = str_replace('\lxid-1 ', "", $row);
                }

                if (strpos($row, 'lx-2 ')) {

                    $resultado2 = str_replace('\lx-2 ', "", $row);
                }

                if (strpos($row, 'hm-4 ')) {

                    $resultado3 = str_replace('\hm-4 ', "", $row);
                }

                if (strpos($row, 'phon-5 ')) {

                    $resultado4 = str_replace('\phon-5 ', "", $row);
                }

                if (strpos($row, 'sec-6 ')) {

                    $resultado5 = str_replace('\sec-6 ', "", $row);
                }

                if (strpos($row, 'predva-7 ')) {

                    $resultado6 = str_replace('\predva-7 ', "", $row);
                }


                if (strpos($row, 'lxdial-8 ')) {

                    $resultado7 = str_replace('\lxdial-8 ', "", $row);
                }

                if (strpos($row, 'var-9 ')) {

                    $resultado8 = str_replace('\var-9 ', "", $row);
                }

                if (strpos($row, 'ps-11 ')) {

                    $resultado9 = str_replace('\ps-11 ', "", $row);
                }

                if (strpos($row, 'et-12 ')) {

                    $resultado10 = str_replace('\et-12 ', "", $row);
                }

                if (strpos($row, 'atr-13 ')) {

                    $resultado11 = str_replace('\atr-13 ', "", $row);
                }

                if (strpos($row, 'abst-14 ')) {

                    $resultado12 = str_replace('\abst-14 ', "", $row);
                }

                if (strpos($row, 'inf-15 ')) {

                    $resultado13 = str_replace('\inf-15 ', "", $row);
                }


                if (strpos($row, 'nopos-16 ')) {

                    $resultado14 = str_replace('\nopos-16 ', "", $row);
                }


                if (strpos($row, 'pl-17 ')) {

                    $resultado15 = str_replace('\pl-17 ', "", $row);
                }


                if (strpos($row, 'plpos-18 ')) {

                    $resultado16 = str_replace('\plpos-18 ', "", $row);
                }


                if (strpos($row, 'pm-19 ')) {

                    $resultado17 = str_replace('\pm-19 ', "", $row);
                }

                if (strpos($row, 'idsn-20 ')) {

                    $resultado18 = str_replace('\idsn-20 ', "", $row);
                }

                if (strpos($row, 'cf-21 ')) {

                    $resultado19 = str_replace('\cf-21 ', "", $row);
                }

                if (strpos($row, 'cfdial-22 ')) {

                    $resultado20 = str_replace('\cfdial-22 ', "", $row);
                }


                if (strpos($row, 'agn-23 ')) {

                    $resultado21 = str_replace('\agn-23 ', "", $row);
                }

                if (strpos($row, 'dif-24 ')) {

                    $resultado22 = str_replace('\dif-24 ', "", $row);
                }


                if (strpos($row, 'sp-25 ')) {

                    $resultado23 = str_replace('\sp-25 ', "", $row);
                }

                if (strpos($row, 'phr-26 ')) {

                    $resultado24 = str_replace('\phr-26 ', "", $row);
                }
                if (strpos($row, 'mor-27 ')) {

                    $resultado25 = str_replace('\mor-27 ', "", $row);
                }

                if (strpos($row, 'morcom-28 ')) {

                    $resultado26 = str_replace('\morcom-28 ', "", $row);
                }

                if (strpos($row, 'audio-29 ')) {
                    $resultado27 = str_replace('\audio-29 ', "", $row);
                }

                if (strpos($row, 'alisto-30 ')) {
                    $resultado28 = str_replace('\alisto-30 ', "", $row);
                }

                if (strpos($row, 'prin-31 ')) {
                    $resultado29 = str_replace('\prin-31 ', "", $row);
                }


                if (strpos($row, 'ly-3 ')) {

                    $resultado30 = str_replace('\ly-3 ', "", $row);
                }

                if (strpos($row, 'min-33 ')) {
                    $resultado31 = str_replace('\min-33 ', "", $row);
                }

                if (strpos($row, 'morinv-32 ')) {
                    $resultado32 = str_replace('\morinv-32 ', "", $row);
                }

                if (strpos($row, 'gl-34 ')) {
                    $resultado33 = str_replace('\gl-34 ', "", $row);
                }

                if (strpos($row, 'psext-10 ')) {

                    $resultado34 = str_replace('\psext-10 ', "", $row);
                }

                if (strpos($row, 'inv-35 ')) {
                    $resultado35 = str_replace('\inv-35 ', "", $row);
                }
            }



            // dd($resultado10);

            $contents[] = array('lxid' => $resultado1, 'lx' => $resultado2, 'hm' => $resultado3, 'phon' => $resultado4, 'sec' => $resultado5, 'predva' => $resultado6, 'lxdial' => $resultado7, 'var' => $resultado8, 'ps' => $resultado9, 'et' => $resultado10, 'atr' => $resultado11, 'abst' => $resultado12, 'inf' => $resultado13, 'nopos' => $resultado14, 'pl' => $resultado15, 'plpos' => $resultado16, 'pm' => $resultado17, 'idsn' => $resultado18, 'cf' => $resultado19, 'cfdial' => $resultado20, 'agn' => $resultado21, 'dif' => $resultado22, 'sp' => $resultado23, 'phr' => $resultado24, 'mor' => $resultado25, 'morcom' => $resultado26, 'audio' => $resultado27, 'alisto' => $resultado28, 'prin' => $resultado29, 'ly' => $resultado30, 'min' => $resultado31, 'morinv' => $resultado32, 'gl' => $resultado33, 'psext' => $resultado34, 'inv' => $resultado35);
        }

        // dd($contents);

        foreach ($contents as $key => $value) {
            $dic = new Dic();
            $dic->lxid = $value['lxid'];
            $dic->lx = $value['lx'];
            $dic->hm = $value['hm'];
            $dic->phon = $value['phon'];
            $dic->sec = $value['sec'];
            $dic->predva = $value['predva'];
            $dic->lxdial = $value['lxdial'];
            $dic->va = $value['var'];
            $dic->ps = $value['ps'];
            $dic->et = $value['et'];
            $dic->atr = $value['atr'];
            $dic->abst = $value['abst'];
            $dic->inf = $value['inf'];
            $dic->nopos = $value['nopos'];
            $dic->pl = $value['pl'];
            $dic->plpos = $value['plpos'];
            $dic->pm = $value['pm'];
            $dic->idsn = $value['idsn'];
            $dic->cf = $value['cf'];
            $dic->cfdial = $value['cfdial'];
            $dic->agn = $value['agn'];
            $dic->dif = $value['dif'];
            $dic->sp = $value['sp'];
            $dic->phr = $value['phr'];
            $dic->mor = $value['mor'];
            $dic->morcom = $value['morcom'];
            $dic->audio = $value['audio'];
            $dic->alisto = $value['alisto'];
            $dic->prin = $value['prin'];
            $dic->ly = $value['ly'];
            $dic->min = $value['min'];
            $dic->morinv = $value['morinv'];
            $dic->gl = $value['gl'];
            $dic->psext = $value['psext'];
            $dic->inv = $value['inv'];



            $dic->save();
        }

        if ($dic->save()) {
            return redirect()->route('dic')->with('message', 'El archivo fue agregado CORRECTAMENTE');
        } else {
            return redirect()->route('home')->with('message', 'OCURRIO UN ERROR');
        }
    }

    public function sentido_data(Request $request)
    {

        // dd($request->sentido);


        $contenido = File::get($request->sentido);



        // dd($contenido);

        Sentido::truncate();

        $pieces = explode("\r\n\r\n", $contenido);

        // dd($pieces);



        foreach ($pieces as $linea) {

            $line[] = explode("\r\n", $linea);

            //$line = str_replace("\r\n", "", $line);

        }

        //  dd($line);

        foreach ($line as $fila) {

            $resultado1 = NULL;
            $resultado2 = NULL;
            $resultado3 = NULL;
            $resultado4 = NULL;
            $resultado5 = NULL;
            $resultado6 = NULL;
            $resultado7 = NULL;
            $resultado8 = NULL;
            $resultado9 = NULL;
            $resultado10 = NULL;
            $resultado11 = NULL;
            $resultado12 = NULL;
            $resultado13 = NULL;
            $resultado14 = NULL;
            $resultado15 = NULL;
            $resultado16 = NULL;

            // dd($fila);
            foreach ($fila as $row) {


                if (strpos($row, 'idsn ')) {

                    $resultado1 = str_replace('\idsn ', "", $row);
                }

                if (strpos($row, 'sndial ')) {

                    $resultado2 = str_replace('\sndial ', "", $row);
                }

                if (strpos($row, 'de1 ')) {

                    $resultado3 = str_replace('\de1 ', "", $row);
                }

                if (strpos($row, 'pc ')) {

                    $resultado4 = str_replace('\pc ', "", $row);
                }

                if (strpos($row, 'sc ')) {

                    $resultado5 = str_replace('\sc ', "", $row);
                }

                if (strpos($row, 'exnum ')) {

                    $resultado6 = str_replace('\exnum ', "", $row);
                }


                if (strpos($row, 'de2 ')) {

                    $resultado7 = str_replace('\de2 ', "", $row);
                }

                if (strpos($row, 'exnum2 ')) {

                    $resultado8 = str_replace('\exnum2 ', "", $row);
                }


                if (strpos($row, 'de3 ')) {

                    $resultado9 = str_replace('\de3 ', "", $row);
                }

                if (strpos($row, 'exnum3 ')) {

                    $resultado10 = str_replace('\exnum3 ', "", $row);
                }


                if (strpos($row, 'sy ')) {

                    $resultado11 = str_replace('\sy ', "", $row);
                }

                if (strpos($row, 'sncf ')) {

                    $resultado12 = str_replace('\sncf ', "", $row);
                }

                if (strpos($row, 'sncfdial ')) {

                    $resultado13 = str_replace('\sncfdial ', "", $row);
                }

                if (strpos($row, 'pc1 ')) {

                    $resultado14 = str_replace('\pc1 ', "", $row);
                }

                if (strpos($row, 'pc2 ')) {

                    $resultado15 = str_replace('\pc2 ', "", $row);
                }

                if (strpos($row, 'pc3 ')) {

                    $resultado16 = str_replace('\pc3 ', "", $row);
                }
            }



            // dd($resultado1);

            $contents[] = array('idsn' => $resultado1, 'sndial' => $resultado2, 'de' => $resultado3, 'pc' => $resultado4, 'sc' => $resultado5, 'exnum' => $resultado6, 'de2' => $resultado7, 'exnum2' => $resultado8, 'de3' => $resultado9, 'exnum3' => $resultado10, 'sy' => $resultado11, 'sncf' => $resultado12, 'sncfdial' => $resultado13, 'pc1' => $resultado14, 'pc2' => $resultado15, 'pc3' => $resultado16);
        }

        // dd($contents);

        foreach ($contents as $key => $value) {
            $sentido = new Sentido();
            $sentido->idsn = $value['idsn'];
            $sentido->sndial = $value['sndial'];
            $sentido->de = $value['de'];
            $sentido->pc = $value['pc'];
            $sentido->sc = $value['sc'];
            $sentido->exnum = $value['exnum'];
            $sentido->de2 = $value['de2'];
            $sentido->exnum2 = $value['exnum2'];
            $sentido->de3 = $value['de3'];
            $sentido->exnum3 = $value['exnum3'];
            $sentido->sy = $value['sy'];
            $sentido->sncf = $value['sncf'];
            $sentido->sncfdial = $value['sncfdial'];
            $sentido->pc1 = $value['pc1'];
            $sentido->pc2 = $value['pc2'];
            $sentido->pc3 = $value['pc3'];


            $sentido->save();
        }

        if ($sentido->save()) {
            return redirect()->route('sentido')->with('message', 'El archivo fue agregado CORRECTAMENTE');
        } else {
            return redirect()->route('home')->with('message', 'OCURRIO UN ERROR');
        }
    }

    public function referencia_data(Request $request)
    {


        $contenido = File::get($request->referencia);



        // dd($contenido);

        Referencia::truncate();

        $pieces = explode("\r\n\r\n", $contenido);

        // dd($pieces);



        foreach ($pieces as $linea) {

            $line[] = explode("\r\n", $linea);

            //$line = str_replace("\r\n", "", $line);

        }

        //  dd($line);

        foreach ($line as $fila) {

            $resultado1 = NULL;
            $resultado2 = NULL;
            $resultado3 = NULL;
            $resultado4 = NULL;
            $resultado5 = NULL;
            $resultado6 = NULL;

            // dd($fila);
            foreach ($fila as $row) {


                if (strpos($row, 'refid ')) {

                    $resultado1 = str_replace('\refid ', "", $row);
                }

                if (strpos($row, 'author ')) {

                    $resultado2 = str_replace('\author ', "", $row);
                }


                if (strpos($row, 'year ')) {

                    $resultado3 = str_replace('\year ', "", $row);
                }

                if (strpos($row, 'title ')) {

                    $resultado4 = str_replace('\title ', "", $row);
                }

                if (strpos($row, 'pub ')) {

                    $resultado5 = str_replace('\pub ', "", $row);
                }

                if (strpos($row, 'nt ')) {

                    $resultado6 = str_replace('\nt ', "", $row);
                }
            }



            // dd($resultado1);

            $contents[] = array('refid' => $resultado1, 'author' => $resultado2, 'year' => $resultado3, 'title' => $resultado4, 'pub' => $resultado5, 'nt' => $resultado6);
        }

        // dd($contents);

        foreach ($contents as $key => $value) {
            $referencia = new Referencia();
            $referencia->refid = $value['refid'];
            $referencia->author = $value['author'];
            $referencia->year = $value['year'];
            $referencia->title = $value['title'];
            $referencia->pub = $value['pub'];
            $referencia->nt = $value['nt'];


            $referencia->save();
        }

        if ($referencia->save()) {
            return redirect()->route('referencia')->with('message', 'El archivo fue agregado CORRECTAMENTE');
        } else {
            return redirect()->route('home')->with('message', 'OCURRIO UN ERROR');
        }
    }
}
