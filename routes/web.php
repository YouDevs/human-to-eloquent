<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController:: class, 'index']);

Route::view('/about', 'about');
Route::view('/contact', 'contact');