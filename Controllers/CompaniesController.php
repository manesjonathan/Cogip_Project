<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\CompanyService;

class CompaniesController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new CompanyService();
    }


//function to return HTML view
//function createCompany get $_POST of form inputs and call the service to create object

}

