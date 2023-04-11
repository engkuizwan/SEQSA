<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FlowController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FunctionController;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\UserprofileController;

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


Route::match(['get', 'head'], '/', function () {
    return view('index');
})->name('index');



// **************************************************** A  U  T  H  E  N  T  I  C  A  T  E************************************************
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// **************************************************** U S E R P R O F I L E************************************************
Route::resource('/userdetail', UserDetailController::class);

// **************************************************** P  R  O  J  E  C  T ************************************************

Route::get('/create', [ProjectController::class, 'create']);
// Route::get('/read', [ProjectController::class, 'read']);
Route::post('/project_add', [ProjectController::class, 'store'])->name('projectstore');

Route::prefix('project') ->group(function(){
    Route::match(['post','get', 'head'],'/list', [ProjectController::class, 'index'])->name('project.admin');
    Route::get('/list/{user_id}', [ProjectController::class, 'indexuser'])->name('project.user');
});

// Route::middleware(['auth','user-role:1'])->group(function(){
// });

// **************************************************** P  R  O  J  E  C  T 2 ************************************************
Route::resource('newproject', ProjectController::class);
Route::get('/project_list', [ProjectController::class, 'read']);
Route::get('/project_show/{projectid}', [ProjectController::class, 'show']);
Route::post('/project_update/{projectid}', [ProjectController::class, 'update']);
Route::get('/project_list/{user_id}', [ProjectController::class, 'readuser']);

// **************************************************** M O  D  U  L  S ************************************************
Route::get('modulindex/{projectId}', [ModulController::class, 'index'])->name('modulindex');
Route::resource('modul', ModulController::class);
Route::get('/modul_edit/{modul_id}', [ModulController::class, 'edit']);
Route::get('/modul_show/{modul_id}', [ModulController::class, 'show']);

// **************************************************** F  L  O  W ************************************************
Route::get('flowindex/{modul_id}', [FlowController::class, 'index'])->name('flowindex');
Route::get('/flow_senarai/{modul_id}', [FlowController::class, 'read']);
Route::get('flow_create/{modul_id}', [FlowController::class, 'create'])->name('flow_create');
Route::get('/flow_show/{flow_id}', [FlowController::class, 'show']);
Route::get('/flow_edit/{flow_id}', [FlowController::class, 'edit']);
Route::resource('flow', FlowController::class);


// **************************************************** F  I  L  E  S ************************************************
Route::get('/fileindex', [FileController::class, 'index'])->name('fileindex');
Route::resource('file',FileController::class);
Route::get('/file_edit/{file_id}', [FileController::class, 'edit']);
Route::get('/file_show/{file_id}', [FileController::class, 'show']);




// **************************************************** F  U  N  C  T  I  O  N  S ************************************************
Route::get('/functionindex', [FunctionController::class, 'index'])->name('functionindex');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ****************************************************  U S E R  P R O F I L E ************************************************
Route::resource('/userprofile', UserprofileController::class);
// Route::post('/register', [UserprofileController::class,'create'])->name('register');