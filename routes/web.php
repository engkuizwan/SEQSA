<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ModulController;
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
Route::get('/create', [ProjectController::class, 'create']);
// Route::get('/read', [ProjectController::class, 'read']);
Route::post('/project_add', [ProjectController::class, 'store'])->name('projectstore');

// **************************************************** P  R  O  J  E  C  T 2 ************************************************
Route::resource('newproject', ProjectController::class);
Route::get('/project_list', [ProjectController::class, 'read']);
Route::get('/project_show/{projectid}', [ProjectController::class, 'show']);
Route::post('/project_update/{projectid}', [ProjectController::class, 'update']);

// **************************************************** F  I  L  E  S ************************************************
Route::get('modulindex/{projectId}', [ModulController::class, 'index'])->name('modulindex');


// **************************************************** F  I  L  E  S ************************************************
Route::get('/fileindex', [FileController::class, 'index'])->name('fileindex');




// **************************************************** F  U  N  C  T  I  O  N  S ************************************************
Route::get('/functionindex', [FunctionController::class, 'index'])->name('functionindex');