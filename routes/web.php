<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Medium\MediumController;
use App\Http\Controllers\Medium\AddMediumController;

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

Route::get('/medium', [MediumController::class, 'index']);

Route::get('/medium/add', [AddMediumController::class, 'index']);
Route::post('/medium/add', [AddMediumController::class, 'handle']);
