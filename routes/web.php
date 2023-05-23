<?php

declare(strict_types=1);

use App\Http\Controllers\Lp\AddLpController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Medium\MediumController;
use App\Http\Controllers\Medium\AddMediumController;
use App\Http\Controllers\Medium\DeleteMediumController;
use App\Http\Controllers\Medium\EditMediumController;
use App\Http\Controllers\Medium\SearchMediumController;
use App\Http\Controllers\MediumDtl\AddMediumDtlController;
use App\Http\Controllers\mediumDtl\DeleteMediumDtlController;
use App\Http\Controllers\mediumDtl\EditMediumDtlController;
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

// About media screen
Route::get('/media', [MediumController::class, 'index']);

Route::get('/medium/create', [AddMediumController::class, 'index']);
Route::post('/medium/store', [AddMediumController::class, 'handle']);

Route::get('/medium/search', [SearchMediumController::class, 'index']);

Route::get('/medium/{medium_id}/edit', [EditMediumController::class, 'index']);
Route::post('/medium/{medium_id}/update', [EditMediumController::class, 'handle']);

Route::get('medium/{medium_id}/delete', [DeleteMediumController::class, 'index']);

// About medium details screen
Route::get('/medium-dtls', [MediumDtlController::class, 'index']);

Route::get('/medium-dtls/create', [AddMediumDtlController::class, 'index']);
Route::post('/medium-dtls/store', [AddMediumDtlController::class, 'handle']);

Route::get('/medium-dtls/search', [SearchMediumDtlController::class, 'index']);

Route::get('/medium-dtls/{medium_dtl_id}/edit', [EditMediumDtlController::class, 'edit']);
Route::post('/medium-dtls/{medium_dtl_id}/update', [EditMediumDtlController::class, 'update']);

Route::get('/medium-dtls/{medium_dtl_id}/delete', [DeleteMediumDtlController::class, 'delete']);

// About LP screen
Route::get('/lps', function () {
    echo 'success';
});

Route::get('/lps/create', [AddLpController::class, 'create']);
Route::post('/lps', [AddLpController::class, 'store']);
