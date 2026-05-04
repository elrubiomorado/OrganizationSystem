<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');

//Notes
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('notes', NoteController::class)->names('admin.notes');
});
