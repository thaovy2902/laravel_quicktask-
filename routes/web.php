<?php
use App\Http\Controllers\LanguageController;

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::resource('/',TaskController::class);
Route::get('language/{language}',[LanguageController::class,'index'])->name('language');
Route::resource('/task', TaskController::class)->only([
    'destroy'
]);
Route::post('/task', [TaskController::class,'store']);