<?php

namespace App\Database\Repositories;

use App\Database\Database;
use App\Database\Models\User;
use PDO;

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
    public function getUser($email, $password)
    {
        $query = 'SELECT * FROM users WHERE email = :email AND password = :password';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $user = $stmt->fetch();
        return $user;
    }
}