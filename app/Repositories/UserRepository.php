<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    public function findById(int $id)
    {
        return DB::select('SELECT * FROM users WHERE id = ?', [$id]);
    }

    public function findAll()
    {
        return DB::select('SELECT * FROM users');
    }

    // 他のメソッド...
}
