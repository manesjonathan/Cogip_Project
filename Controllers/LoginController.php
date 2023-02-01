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
//function connectUser get $_POST of form inputs and call the service
}

