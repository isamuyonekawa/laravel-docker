<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\ValidateController;
use App\Http\Middleware\HelloGonbe;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Jobs\JobTest;
use App\Http\Controllers\PostManageController;
use Illuminate\Auth\Events\Login;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\DownloadHistory;


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('dashboard', function () {
    return view('dashboard');
});



Route::prefix('member')->middleware('auth')->name('member.')->group(function () {
    Route::resource('posts', 'PostManageController::class');
});

Route::get('member', function () {
    if (! Gate::allows('only-admin')) {
        abort(403);
    }

    $user = Auth::user();
    $downloadHistories = $user->downloadHistories; // ユーザーのダウンロード履歴を取得

    return view('member', compact('user', 'downloadHistories'));
})->middleware('auth')->name('member');















Route::get('/addjob/{id}', function ($id) {
    $user = User::find($id);

    $downloadHistory = new DownloadHistory();
    $downloadHistory->user_id = $user->id;
    $downloadHistory->type = 'user_list';
    $downloadHistory->status = 'pending';
    $downloadHistory->search_conditions = json_encode([
        'name' => 'test',
        'age' => 20,
    ]);
    $downloadHistory->s3_file_path = null; // S3ファイルパスは後で設定する
    $downloadHistory->save();

    JobTest::dispatch($downloadHistory);

    return view('welcome', [
        'user' => $user,
    ]);
});

Route::get('hello', [HelloController::class, 'index'])->name('hello.index');
Route::get('param/{id}/{name?}', [HelloController::class, 'param']);

Route::get('validate', [ValidateController::class, 'index'])->name('validate.index');
Route::post('validate', [ValidateController::class, 'indexPost']);
