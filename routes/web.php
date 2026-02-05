<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::post('/', [HomeController::class, 'postPrompt']);

Route::post('/form', [HomeController::class, 'form']);

Route::view('/about', 'about');
Route::view('/contact', 'contact');