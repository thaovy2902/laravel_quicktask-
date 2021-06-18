<?php
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('language/{language}', [LanguageController::class, 'index'])->name('language');
Route::resource('/tasks', TaskController::class)->only([
    'destroy', 'store', 'index'

]);
