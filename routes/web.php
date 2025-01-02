<?php

use App\Http\Controllers\ProfileController;

use App\Mail\SeriesCreated;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\SeasonsController;
use App\Http\Controllers\Web\SeriesController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\EpisodesController;
use App\Models\Series;

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

Route::get('/email', function () {
    return new SeriesCreated(
        'Série teste',
        1,
        1,
        24
    );
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';


