<?php

namespace App\Routes;

use App\Controllers\LoginController;
use App\Services\CompanyService;
use Bramus\Router\Router;
use App\Controllers\HomeController;

if (isset($_SERVER['HTTP_ORIGIN'])) {
    // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
    // you want to allow, and if so:
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 1000');
}
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
        // may also be using PUT, PATCH, HEAD etc
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
    }

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
        header("Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token, Authorization");
    }
    exit(0);
}

$router = new Router();

//Login page
$router->get('/', function () {
    (new LoginController())->index();
});

//route to return dashboard (Home) view
$router->post('/login', function () {
    (new LoginController())->login();
});


$router->get('/logout', function () {
    (new LoginController())->logout();
});


//route to return create company view
//route to return create contact view
//route to logout?

// || Start of ADMIN routes
$router->before('GET|POST|DELETE|UPDATE', '/admin/*', function () {
    session_start();
    if (!isset($_SESSION['user'])) {
        header('location: /');
        exit();
    }
});


//route to return create invoice view

$router->get('/admin/dashboard', function () {
    session_start();
    (new HomeController())->index('dashboard');
});

$router->get('/admin/invoices', function () {
    session_start();
    (new HomeController())->index('invoices');
});

$router->get('/admin/companies', function () {
    session_start();
    (new HomeController())->index('companies');
});

$router->get('/admin/contacts', function () {
    session_start();
    (new HomeController())->index('contacts');
});

// || Start of admin related get requests
$router->get("/admin/get-latest-contacts/company/{company_id}", function ($company_id) {
    return (new CompanyService())->getLastFiveContactsByCompany($company_id);
});

$router->get("/admin/get-latest-invoices/company/{company_id}", function ($company_id) {
    return (new CompanyService())->getLastFiveInvoicesByCompany($company_id);
});

$router->get("/admin/get-latest-companies", function () {
    return (new CompanyService())->getLastFiveCompanies();
});
// || End of admin related get requests

// || Start of admin related post requests
$router->post("/admin/add-company/{type_id}/{name}/{country}/{tva}", function ($type_id, $name, $country, $tva) {
    return (new CompanyService())->createCompany([
        "type_id" => $type_id,
        "name" => $name,
        "country" => $country,
        "tva" => $tva
    ]);
});

$router->post("/admin/add-contact/{company_id}/{name}/{email}/{phone}", function ($company_id, $name, $email, $phone) {
    return (new CompanyService())->createContact([
        "company_id" => $company_id,
        "name" => $name,
        "email" => $email,
        "phone" => $phone
    ]);
});

$router->post("/admin/add-invoice/{company_id}/{ref}", function ($company_id, $ref) {
    return (new CompanyService())->createInvoice(["company_id" => $company_id, "ref" => $ref]);
});
// || End of admin related post requests
// || End of admin routes

// || Start of frontend related routes
$router->get('/get-data', function () {
    return (new CompanyService())->getData();
});

// || Start Company related routes
$router->get("/get-company/{id}", function ($id) {
    return (new CompanyService())->getCompanyById($id);
});
// End of company related routes

// || Start of contact routes
$router->get("/get-contacts", function () {
    return (new CompanyService())->getAllContacts();
});

$router->get("/get-contacts/company/{company_id}", function ($company_id) {
    return (new CompanyService())->getAllContactsByCompany($company_id);
});

$router->get("/get-contact/{id}", function ($id) {
    return (new CompanyService())->getContactById($id);
});
// End of contact routes

// || Start of invoice routes
$router->get("/get-invoices/company/{company_id}", function ($company_id) {
    return (new CompanyService())->getInvoicesByCompany($company_id);
});


$router->get("/get-invoice/{id}", function ($id) {
    return (new CompanyService())->getInvoiceById($id);
});
// || End of invoice routes
// || End of frontend related routes

$router->run();