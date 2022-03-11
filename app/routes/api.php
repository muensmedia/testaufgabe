<?php

use App\Http\Controllers\CopyrightController;
use Illuminate\Support\Facades\Route;

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

Route::get('/copyright', function () {
    return CopyrightController::showCopyright();
})->name('start');

Route::patch('/play/{x}/{y}', [\App\Http\Controllers\GameController::class, 'play'])
->name('play-api')->where('x', '[0-9]+')->where('y', '[0-9]+');

Route::patch('/play-bot', [\App\Http\Controllers\GameController::class, 'playBot'])
->name('play-bot');

Route::get('/board', [\App\Http\Controllers\GameController::class, 'display'])
->name('display');

Route::delete('/board', [\App\Http\Controllers\GameController::class, 'reset'])
->name('reset');

