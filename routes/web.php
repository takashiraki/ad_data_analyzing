<?php

declare(strict_types=1);

use App\Http\Controllers\Lp\AddLpController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Media\CreateMediumController;
use App\Http\Controllers\Media\DeleteMediumController;
use App\Http\Controllers\Media\EditMediumController;
use App\Http\Controllers\Media\SearchMediumController;
use App\Http\Controllers\MediaDtl\CreateMediumDtlController;
use App\Http\Controllers\mediaDtl\EditMediumDtlController;

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

/**
 * --------------------------------------------------------------------------
 * Media
 * --------------------------------------------------------------------------
 */

Route::get('/media', [SearchMediumController::class, 'index']);

Route::get('/medium/create', [CreateMediumController::class, 'index']);
Route::post('/medium/store', [CreateMediumController::class, 'handle']);

// Route::get('/medium/search', [SearchMediumController::class, 'index']);

Route::get('/medium/{medium_id}/edit', [EditMediumController::class, 'index']);
Route::post('/medium/{medium_id}/update', [EditMediumController::class, 'handle']);

Route::get('/medium/{medium_id}/delete', [DeleteMediumController::class, 'index']);
Route::post('/medium/{medium_id}/destroy', [DeleteMediumController::class, 'destroy']);


/**
 * --------------------------------------------------------------------------
 * Media Details
 * --------------------------------------------------------------------------
 */

Route::get('/medium-dtls', [MediumDtlController::class, 'index']);

Route::get('/medium-dtls/create', [CreateMediumDtlController::class, 'index']);
Route::post('/medium-dtls/store', [CreateMediumDtlController::class, 'handle']);

Route::get('/medium-dtls/search', [SearchMediumDtlController::class, 'index']);

Route::get('/medium-dtls/{medium_dtl_id}/edit', [EditMediumDtlController::class, 'edit']);
Route::post('/medium-dtls/{medium_dtl_id}/update', [EditMediumDtlController::class, 'update']);

Route::get('/medium-dtls/{medium_dtl_id}/delete', [DeleteMediumDtlController::class, 'delete']);

/**
 * --------------------------------------------------------------------------
 * LP
 * --------------------------------------------------------------------------
 */

Route::get('/lps', function () {
    echo 'success';
});

Route::get('/lps/create', [AddLpController::class, 'create']);
Route::post('/lps', [AddLpController::class, 'store']);
