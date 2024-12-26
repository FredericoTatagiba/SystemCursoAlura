<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::resource('/series', SeriesController::class)->except('show');

Route::middleware('authenticator')->group(function(){
    Route::get('/series/{series}', [SeriesController::class, 'show'])->name('series.show');

    Route::get('/', function () {
        return redirect('/series');
    });

    Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');
    Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');
    Route::put('/seasons/{season}/episodes', [EpisodesController::class, 'watched'])->name('episodes.watched');
});

Route::get('/login', [UserController::class,'index'])->name('login');
Route::post('/login', [UserController::class,'login'])->name('signin');
Route::get('/logout', [UserController::class,'logout'])->name('logout');


Route::get('/register', [UserController::class,'create'])->name('user.create');
Route::post('/register', [UserController::class,'store'])->name('user.store');




// ->only(['index', 'create', 'store', 'destroy', 'edit', 'update']);
// Route::controller(SeriesController::class)->group(function (){
//     Route::get('/series', 'index')->name('series.index');
//     Route::get('/series/adicionar', 'create')->name('series.create');
//     Route::post('/series/salvar', 'store')->name('series.store');
// });

// Route::delete('/series/destroy/{id}', [SeriesController::class,'destroy'])->name('series.destroy'););