<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class HelloController extends Controller {
    //
    public function index(Request $request) {
        //$user = User::find(1);
        //return $user;

        $name     = $request->input('name');
        $nickname = $request->input('nickname');

        return view('hello', compact('name', 'nickname'));
    }

    public function param($id, $name = 'anonymous') {
        return 'id: ' . $id . ' \\\\\\\\\\\\\ ' . 'name: ' . $name;
    }
}
