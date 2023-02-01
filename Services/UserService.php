<?php

namespace App\Services;

use App\Database\Repositories\UserRepository;

class UserService
{
    private $user_repository;

    public function __construct()
    {
        $this->user_repository = new UserRepository();
    }


//function getAllUsers() return array

//function getUserById($id) return user

//function isUserRegistered($user) return bool

//function registerUser($array) return user
}