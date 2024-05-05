<?php

use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\FichierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PalierControlller;
use App\Http\Controllers\StageController;
use App\Http\Controllers\SujetController;
use App\Http\Controllers\TachesController;

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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('pcaliers', PalierControlller::class);
    Route::resource('stage', StageController::class);
    Route::resource('sujet', SujetController::class);
    Route::resource('taches', TachesController::class);
    Route::resource('evaluation', EvaluationController::class);
    Route::resource('fichier', FichierController::class);
    // Route::post('')

});

