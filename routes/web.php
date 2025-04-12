<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\ValidateController;
use App\Http\Middleware\HelloGonbe;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Jobs\JobTest;

Route::get('/addjob/{id}', function ($id) {

    //$user = User::first();
    //$user->delete();

    $user = User::find($id);

    JobTest::dispatch($user);

    return view('welcome', [
        'user' => $user,
    ]);
});

Route::get('addjob', function () {
    $user = User::first();

    return $user->name;
});

Route::get('hello', [HelloController::class, 'index'])->name('hello.index');
Route::get('param/{id}/{name?}', [HelloController::class, 'param']);

Route::get('validate', [ValidateController::class, 'index'])->name('validate.index');
Route::post('validate', [ValidateController::class, 'indexPost']);
