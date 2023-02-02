<?php

namespace App\Routes;

use App\Controllers\LoginController;
use App\Services\CompanyService;
use Bramus\Router\Router;
use App\Controllers\HomeController;

$router = new Router();

//Login page
$router->get('/', function () {
    (new LoginController())->index();
});

$router->post('/login', function () {
    (new LoginController())->login();
});


//route to return dashboard (Home) view
//route to return create invoice view
//route to return create company view
//route to return create contact view
//route to logout?


// API / FRONT-END ROUTES // Call directly appropriate service class
//route to return json object containing 3 arrays (last 5 invoices, last 5 contact, last 5 companies)

$router->get('/get-data', function () {
    return (new CompanyService())->getData();
});


//route get all companies
//route get company by id
//route get all invoices
//route get invoice by id
//route get all contacts
//route get contact by id

$router->run();