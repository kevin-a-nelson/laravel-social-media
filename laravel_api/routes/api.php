<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('contacts', [App\Http\Controllers\ContactController::class, 'contacts']);
Route::post('save_contact', [App\Http\Controllers\ContactController::class, 'saveContact']);
Route::get('login', [App\Http\Controllers\UserController::class, 'login']);
Route::post('user', [App\Http\Controllers\UserController::class, 'create']);

Route::get('posts', [App\Http\Controllers\PostController::class, 'index']);
Route::get('posts/{id}', [App\Http\Controllers\PostController::class, 'show']);
Route::post('posts', [App\Http\Controllers\PostController::class, 'create']);
Route::post('posts/{id}', [App\Http\Controllers\PostController::class, 'update']);
Route::delete('posts/{id}', [App\Http\Controllers\PostController::class, 'delete']);