<?php

namespace App\Database\Repositories;

use App\Database\Database;

class UserRepository
{

    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }



//function getAllUsers()

//function getUserById($id)

//function isUserRegistered($user)

//function createUser($user)
}