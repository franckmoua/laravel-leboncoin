<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnonceController;
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

Route::get('/', [AnnonceController::class, 'front'])->name('annonce.front');
Route::get('annonces', [AnnonceController::class, 'index'])->name('annonce.create');
Route::post('annonces', [AnnonceController::class, 'store'])->name('annonce.store');
Route::get('/annonces/{id}', [AnnonceController::class, 'details'])->name('annonce.details');
Route::get('/annonces/validation/{token}', [App\Http\Controllers\ContactController::class, 'validateAnnonce'])->name('annonce.validate');
Route::post('annonces/delete/{token}', [AnnonceController::class, 'delete'])->name('annonce.delete');