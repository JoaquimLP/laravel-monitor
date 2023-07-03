<?php

use App\Http\Controllers\Admin\EndpointController;
use App\Http\Controllers\Admin\SiteController;
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

Route::middleware('auth')->prefix('admin')->group(function () {

    /**
     * Sites
     */
    Route::get('/site', [SiteController::class, 'index'])->name('site.index');
    Route::get('/site/create', [SiteController::class, 'create'])->name('site.create');
    Route::post('/site/store', [SiteController::class, 'store'])->name('site.store');
    Route::get('/site/{site}/edit', [SiteController::class, 'edit'])->name('site.edit');
    Route::put('/site/{site}/update', [SiteController::class, 'update'])->name('site.update');
    Route::delete('/site/{site}/destroy', [SiteController::class, 'destroy'])->name('site.destroy');

    Route::get('/sites/{site_id}/endpoints', [EndpointController::class, 'index'])->name('endpoints.index');
    Route::get('/sites/{site_id}/endpoint/create', [EndpointController::class, 'create'])->name('endpoints.create');
    Route::post('/sites/{site}/endpoint/store', [EndpointController::class, 'store'])->name('endpoints.store');
    Route::get('/site/{site}/endpoint/{endpoint}/edit', [EndpointController::class, 'edit'])->name('endpoints.edit');
    Route::put('/site/{site}/endpoint/{endpoint}/update', [EndpointController::class, 'update'])->name('endpoints.update');
    Route::delete('/site/{site}/endpoint/{endpoint}/destroy', [EndpointController::class, 'destroy'])->name('endpoints.destroy');
});

require __DIR__.'/auth.php';
