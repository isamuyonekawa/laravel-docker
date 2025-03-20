<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidateController extends Controller
{
    //
    public function index()
    {
        return view('validate.index');
    }

    public function indexPost(Request $request)
    {
        $request->validate([
            'name'  => ['required', 'min:3', 'max:10'],
            'email' => ['required', 'email'],
        ], [
            'name.required' => '名前は必須です。',
            'name.min'      => '名前は3文字以上で入力してください。',
            'name.max'      => '名前は10文字以内で入力してください。',
            'email.required' => 'メールアドレスは必須です。',
            'email.email'    => 'メールアドレスの形式で入力してください。',
        ], [
            'name'  => '名前',
            'email' => 'メールアドレス',
        ]);

        dd('Validation Success');
    }
}
