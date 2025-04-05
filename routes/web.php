<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contacts/create', [HomeController::class, 'create'])->name('contacts.create');
Route::get('/contacts/{id}', [HomeController::class, 'show'])->name('contacts.show');

Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
