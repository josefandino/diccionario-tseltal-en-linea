<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AbecedarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('file', FileController::class);
Route::resource('image', ImageController::class);

Route::post('/dic_data', [AbecedarioController::class, 'dic_data'])->name('dic_data');
Route::post('/exnum_data', [AbecedarioController::class, 'exnum_data'])->name('exnum_data');
Route::post('/sentido_data', [AbecedarioController::class, 'sentido_data'])->name('sentido_data');
Route::post('/referencia_data', [AbecedarioController::class, 'referencia_data'])->name('referencia_data');
Route::post('/img_data', [AbecedarioController::class, 'img_data'])->name('img_data');

Route::get('', [AbecedarioController::class, 'index'])->name('index');
Route::get('/antecedentes', [AbecedarioController::class, 'antecedentes'])->name('antecedentes');
Route::get('/donativos',  [AbecedarioController::class, 'donativos'])->name('donativos');
Route::get('/colaboradores',  [AbecedarioController::class, 'colaboradores'])->name('colaboradores');
Route::get('/espanol', [AbecedarioController::class, 'espanol'])->name('espanol');

Route::get('aplicacion/{lxid}', [AbecedarioController::class, 'ver'])->name('aplicacion');

Route::post('/tseltal', [AbecedarioController::class, 'tseltal_fetch'])->name('tseltal_fetch');
Route::post('/espanol', [AbecedarioController::class, 'espanol_fetch'])->name('espanol_fetch');
Route::get('/{id}', [AbecedarioController::class, 'abededarioSelecionada'])->name('abededarioSelecionada');
