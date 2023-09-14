<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
		{


		    return view('form');
		}


    public function store(Request $request)
		 {

		            $path = public_path().'/audios/';
		            $files = $request->file('file');
		            foreach($files as $file){
		                $fileName = $file->getClientOriginalName();
		                $file->move($path, $fileName);
		            }
		 }

}
