<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUserById(int $id)
    {
        return $this->userRepository->findById($id);
    }

    public function getAllUsers()
    {
        return $this->userRepository->findAll();
    }

    // 他のメソッド...
}
