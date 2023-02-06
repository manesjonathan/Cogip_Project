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

    public function getAllUsers()
    {
        $query = 'SELECT first_name, last_name, email FROM users';
        $stmt = $this->db->prepare($query);

        $stmt->excute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($id)
    {
        $query = 'SELECT * FROM users WHERE id=:id';
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

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
    public function createUser($user)
    {
        $query = 'INSERT INTO users (first_name, last_name, email, password, role_id)
                  VALUES (:first_name, :last_name, :email, :password, :role_id';
        $stmt = $this->db->prepare($query);
        return $stmt->execute($user);
    }
}