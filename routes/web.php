<?php

use App\Http\Controllers\CustomerController;
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

Route::get('/dashboard', [CustomerController::class, 'registered'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/successful', [CustomerController::class, 'index'])->name('profile.sucessful');
Route::post('/dashboard/store', [CustomerController::class, 'store'])->name('profile.store');
Route::get('/list', [CustomerController::class, 'list'])->name('list');
Route::get('/list/{id}', [CustomerController::class, 'details'])->name('details');
Route::post('/list/filter', [CustomerController::class, 'filter'])->name('filter');
Route::get('/update', [CustomerController::class, 'update'])->name('update');
Route::get('/update/{id}', [CustomerController::class, 'change'])->name('change');
Route::post('/update/done', [CustomerController::class, 'updatedone'])->name('updatedone');

// Route::post('/update/store', [CustomerController::class, 'filter'])->name('update.sucessful');

require __DIR__ . '/auth.php';
