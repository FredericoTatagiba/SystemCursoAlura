<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeasonsController;
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

Route::get('/', function () {
    return redirect('/series');
});

Route::resource('/series', SeriesController::class)
    ->except('show');


Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])
    ->name('seasons.index');

Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])
    ->name('episodes.index');

Route::put('/seasons/{season}/episodes', [EpisodesController::class, 'watched'])
    ->name('episodes.watched');


// ->only(['index', 'create', 'store', 'destroy', 'edit', 'update']);
// Route::controller(SeriesController::class)->group(function (){
//     Route::get('/series', 'index')->name('series.index');
//     Route::get('/series/adicionar', 'create')->name('series.create');
//     Route::post('/series/salvar', 'store')->name('series.store');
// });

// Route::delete('/series/destroy/{id}', [SeriesController::class,'destroy'])->name('series.destroy');