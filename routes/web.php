<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\ValidateController;
use App\Http\Middleware\HelloGonbe;

Route::get('/', function () {
    return view('welcome');
})->middleware(HelloGonbe::class);

Route::get('hello', [HelloController::class, 'index'])->name('hello.index');
Route::get('param/{id}/{name?}', [HelloController::class, 'param']);

Route::get('validate', [ValidateController::class, 'index'])->name('validate.index');
Route::post('validate', [ValidateController::class, 'indexPost']);
