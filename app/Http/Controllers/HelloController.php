<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Services\UserService;

class HelloController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        //$user = User::find(1);
        //return $user;

        $users    = $this->userService->getAllUsers();
        $name     = $request->input('name');
        $nickname = $request->input('nickname');

        return view('hello', compact('name', 'nickname', 'users'));
    }

    public function param($id, $name = 'anonymous')
    {
        return 'id: ' . $id . ' \\\\\\\\\\\\\ ' . 'name: ' . $name;
    }
}
