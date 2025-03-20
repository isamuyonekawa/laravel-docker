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
        ]);

        dd('Validation Success');
    }
}
