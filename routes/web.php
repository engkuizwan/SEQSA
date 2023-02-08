<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FunctionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// **************************************************** P  R  O  J  E  C  T ************************************************
Route::get('/projectindex', [ProjectController::class, 'index'])->name('projectindex');
Route::get('/project_add', [ProjectController::class, 'create'])->name('projectadd');



// **************************************************** F  I  L  E  S ************************************************
Route::get('/fileindex', [FileController::class, 'index'])->name('fileindex');




// **************************************************** F  U  N  C  T  I  O  N  S ************************************************
Route::get('/functionindex', [FunctionController::class, 'index'])->name('functionindex');