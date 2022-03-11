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

Route::get('/health', [\App\Http\Controllers\Api\HealthController::class, 'info'])
    ->name('health');

Route::post('/start', function () {
    return CopyrightController::showCopyright();
})->name('start');
