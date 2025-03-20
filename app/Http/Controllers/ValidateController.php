<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSaveRequest;
use App\Rules\RequiredIfNanashi;
use Attribute;
use Illuminate\Http\Request;

class ValidateController extends Controller
{
    //
    public function index()
    {
        return view('validate.index');
    }

    public function indexPost(UserSaveRequest $request)
    {
        $validate = $request->validated();

        dd($validate);
    }

    public function attributes()
    {
        return [
            'name'     => '名前',
            'email'    => 'メールアドレス',
            'nickname' => 'ニックネーム',
        ];
    }
}
