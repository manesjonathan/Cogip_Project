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

    public function verifyUser($email, $password)
    {
        if (!isset($email, $password)) {
            return false;
        }

        $email = $this->sanitizeInput($email);
        $password = $this->sanitizeInput($password);

        if (!$this->validateInput($password) || !$this->validateEmail($email)) {
            return false;
        }

        $user = $this->user_repository->getUser($email, $password);

        if ($user == null) {
            return false;
        }

        //todo we need to hash the password in db to use this

        //$hashed_password = password_hash($password, PASSWORD_BCRYPT);


        /*if (!password_verify($password, $user['password'])) {
            return false;
        }*/

        session_start();
        $_SESSION['user'] = $user['first_name'];
        return true;
    }

    private function sanitizeInput($input)
    {
        return trim(htmlspecialchars($input));
    }

    private function validateInput($input)
    {
        return !empty($input);
    }

    private function validateEmail($email)
    {
        $regex = '/^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/';
        return preg_match($regex, $email);
    }
}