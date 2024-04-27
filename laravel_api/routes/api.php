<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('contacts', [App\Http\Controllers\ContactController::class, 'contacts']);
Route::post('save_contact', [App\Http\Controllers\ContactController::class, 'saveContact']);
Route::get('login', [App\Http\Controllers\UserController::class, 'login']);
Route::post('user', [App\Http\Controllers\UserController::class, 'create']);