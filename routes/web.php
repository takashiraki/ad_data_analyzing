<?php

declare(strict_types=1);

use App\Http\Controllers\Form\CreateFormController;
use App\Http\Controllers\Form\EditFormController;
use App\Http\Controllers\Lp\CreateLpController;
use App\Http\Controllers\Lp\DeleteLpController;
use App\Http\Controllers\Lp\EditLpController;
use App\Http\Controllers\Lp\SearchLpController;
use App\Http\Controllers\Media\CreateMediumController;
use App\Http\Controllers\Media\DeleteMediumController;
use App\Http\Controllers\Media\EditMediumController;
use App\Http\Controllers\Media\SearchMediumController;
use App\Http\Controllers\MediaDtl\CreateMediumDtlController;
use App\Http\Controllers\MediaDtl\DeleteMediumDtlController;
use App\Http\Controllers\mediaDtl\EditMediumDtlController;
use App\Http\Controllers\MediaDtl\SearchMediumDtlController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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
Route::get('/medium-dtls', [SearchMediumDtlController::class, 'index']);

Route::get('/medium-dtls/create', [CreateMediumDtlController::class, 'index']);
Route::post('/medium-dtls/store', [CreateMediumDtlController::class, 'handle']);

// Route::get('/medium-dtls/search', [SearchMediumDtlController::class, 'index']);

Route::get('/medium-dtls/{medium_dtl_id}/edit', [EditMediumDtlController::class, 'edit']);
Route::post('/medium-dtls/{medium_dtl_id}/update', [EditMediumDtlController::class, 'update']);

Route::get('/medium-dtls/{medium_dtl_id}/delete', [DeleteMediumDtlController::class, 'index']);
Route::post('/medium-dtls/{medium_dtl_id}/delete', [DeleteMediumDtlController::class, 'handle']);

/**
 * --------------------------------------------------------------------------
 * LP
 * --------------------------------------------------------------------------
 */
Route::get('/lps', [SearchLpController::class, 'index']);

Route::get('/lps/create', [CreateLpController::class, 'index']);
Route::post('/lps/store', [CreateLpController::class, 'handle']);

Route::get('/lps/{lp_id}/edit', [EditLpController::class, 'index']);
Route::post('/lps/{lp_id}/update', [EditLpController::class, 'handle']);

Route::get('/lps/{lp_id}/delete', [DeleteLpController::class, 'index']);
Route::post('/lps/{lp_id}/delete', [DeleteLpController::class, 'handle']);

/**
 * --------------------------------------------------------------------------
 * Form
 * --------------------------------------------------------------------------
 */
Route::get('/forms/create', [CreateFormController::class, 'index']);
Route::post('/forms/store', [CreateFormController::class, 'handle']);

Route::get('/forms/{form_id}/edit', [EditFormController::class, 'index']);
Route::post('/forms/{form_id}/update', [EditFormController::class, 'handle']);
require __DIR__ . '/auth.php';
