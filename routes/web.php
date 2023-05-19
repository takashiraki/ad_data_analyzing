<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Medium\MediumController;
use App\Http\Controllers\Medium\AddMediumController;
use App\Http\Controllers\Medium\SearchMediumController;
use App\Http\Controllers\MediumDtl\AddMediumDtlController;
use App\Http\Controllers\MediumDtl\MediumDtlController;
use App\Http\Controllers\MediumDtl\SearchMediumDtlController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/media', [MediumController::class, 'index']);

Route::get('/medium/create', [AddMediumController::class, 'index']);
Route::post('/medium/store', [AddMediumController::class, 'handle']);

Route::get('/medium/search', [SearchMediumController::class, 'index']);

Route::get('/medium-dtls', [MediumDtlController::class, 'index']);

Route::get('/medium-dtls/create', [AddMediumDtlController::class, 'index']);
Route::post('/medium-dtls/store', [AddMediumDtlController::class, 'handle']);

Route::get('/medium-dtls/search', [SearchMediumDtlController::class, 'index']);
