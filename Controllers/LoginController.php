<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\UserService;

class LoginController extends Controller
{

    private $service;

    public function __construct()
    {
        $this->service = new UserService();
    }

//function to return HTML view

    public function index()
    {
        return $this->view('login');
    }

//function connectUser get $_POST of form inputs and call the service


    public function login()
    {
        $is_valid = $this->service->verifyUser($_POST['email'], $_POST['password']);

        if (!$is_valid) {
            return $this->view('login', ["message" => "You are not connected"]);
        }

        return $this->viewAdmin('dashboard', ["name" => $_SESSION['user']]);
    }

    public function logout()
    {
        session_start();
        unset($_SESSION["user"]);
        header("Location:/");
    }
}

