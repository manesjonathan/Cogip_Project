<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\CompanyService;

class HomeController extends Controller
{

    private $service;

    public function __construct()
    {
        $this->service = new CompanyService();
    }


    public function index()
    {
        return $this->view('welcome', ["name" => "Cogip"]);
    }
}