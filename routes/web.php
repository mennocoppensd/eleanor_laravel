<?php

use App\Http\Controllers\ContactMessageController;
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

Route::view('/', 'pages.home')->name('home');
Route::view('/about-us', 'pages.about')->name('about');
Route::view('/services', 'pages.services')->name('services');
Route::view('/careers', 'pages.careers')->name('careers');
Route::view('/contact', 'pages.contact')->name('contact');
Route::get('/admin/messages', [ContactMessageController::class, 'index'])->name('admin.messages');
Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');
