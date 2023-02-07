<?php

namespace App\Services;

use App\Database\Repositories\UserRepository;

require_once "ValidatorService.php";

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

        $email = ValidatorService::sanitizeEmail($email);
        $email = ValidatorService::validateEmail($email);
        if (!$email) {
            return false;
        }
        
        if (!password_verify($password, $user['password'])) {
            return false;
        }
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);


        $user = $this->user_repository->getUser($email, $hashed_password);

        if ($user == null) {
            return false;
        }


        session_start();
        $_SESSION['user'] = $user['first_name'];
        return true;
    }

    public function createUser($user)
    {
        $errors = [];
        foreach ($user as $key => $data)
        {
            if (ValidatorService::isInputEmpty($data))
            {
                $errors[$key] = "is empty";
                continue;
            }

            if ($key == "email")
            {
               $data = ValidatorService::sanitizeEmail($data);
               $data = ValidatorService::validateEmail($data);
               if(!$data){
                $errors["email"] = "invalid email";
               }
            } else if ($key == "password"){
                $data = password_hash($data, PASSWORD_BCRYPT);
            } else{
                $data = ValidatorService::sanitize_text($data);
            }
        }

        if (count($errors) == 0){
            return $errors;
        }

        return $this->user_repository->createUser($data);
    }

    public function deleteUser($user_id)
    {
        $query = "DELETE FROM users WHERE id=:user_id";
        $stmt = $this->user_repository->prepare($query);

        return $stmt->execute(["user_id" => $user_id]);
    }

    public function getAllUsers()
    {
        $users = $this->user_repository->getAllUsers();
        return $users;
    }

    public function getUserById($id)
    {
        if(!ValidatorService::is_numeric($id)) {
            return false;
        }

        return $this->user_repository->getUserById($id);
    }
}