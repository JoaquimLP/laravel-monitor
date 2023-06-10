<?php

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
});

require __DIR__.'/auth.php';
