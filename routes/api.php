<?php

use App\Http\Controllers\Api\SeriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use illuminate\Support\Facades\Auth;
use App\Models\Series;
use App\Models\Episode;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    if (!Auth::attempt($credentials)) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    $user = Auth::user();
    $token = $user->createToken('token');
    return response()->json($token->plainTextToken);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/series', SeriesController::class);

    Route::prefix('/series/{series}')->group(function () {
        Route::get('/seasons', function (Series $series) {
            return $series->seasons;
        });

        Route::get('/episodes', function (Series $series) {
            return $series->episodes;
        });
    });

    Route::patch('/episodes/{episode}', function (Episode $episode, Request $request) {
        $episode->watched = $request->watched;
        $episode->save();
        return $episode;
    });
});