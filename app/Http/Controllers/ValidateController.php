<?php

namespace App\Http\Controllers;

use App\Rules\RequiredIfNanashi;
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
        $request->validate(
            [
                'name' => ['required'],
                'nickname' => ['nullable', new RequiredIfNanashi($request->input('name'))],
            ],
            [],
            [
                'name' => '名前',
                'nickname' => 'ニックネーム',
            ]
        );

        dd('Validation Success');
    }
}
