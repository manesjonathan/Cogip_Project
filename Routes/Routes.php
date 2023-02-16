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


// || Start of ADMIN routes
$router->before('GET|POST|DELETE|UPDATE', '/admin/.*', function () {
    session_start();
    if (!isset($_SESSION['user'])) {
        header('location: /', true, 401);
        exit();
    }
});


// || Start of admin related get requests
$router->get('/admin/dashboard', function () {
    (new HomeController())->index('dashboard');
});

$router->get('/admin/invoices', function () {
    (new HomeController())->index('invoices');
});

$router->get('/admin/companies', function () {
    (new HomeController())->index('companies');
});

$router->get('/admin/contacts', function () {
    (new HomeController())->index('contacts');
});

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

$router->get("/admin/edit-company/{id}", function ($id) {
    (new HomeController())->viewAdmin('companies', ["name" => $_SESSION['user'], 'id' => $id]);
});

$router->post("/admin/add-company", function () {
    $company = (new CompanyService())->createCompany($_POST['id'], $_POST['type_id'], $_POST['name'], $_POST['country'], $_POST['tva']);
    if ($company) {
        (new HomeController())->viewAdmin('dashboard', ["name" => $_SESSION['user']]);
    }
    return null;
});

$router->post("/admin/delete-company/{id}", function ($id) {
    $deleteCompany = (new CompanyService())->deleteCompany($id);
    if ($deleteCompany) {
        (new HomeController())->viewAdmin('dashboard', ["name" => $_SESSION['user']]);
    }
    return null;
});

$router->get("/admin/edit-contact/{id}", function ($id) {
    (new HomeController())->viewAdmin('contacts', ["name" => $_SESSION['user'], 'id' => $id]);
});

$router->post("/admin/add-contact", function () {
    $contact = (new CompanyService())->createContact($_POST['contact_id'], $_POST['type_id'], $_POST['name'], $_POST['email'], $_POST['phone']);
    if ($contact) {
        (new HomeController())->viewAdmin('dashboard', ["name" => $_SESSION['user']]);
    }
    return null;
});

$router->post("/admin/delete-contact/{id}", function ($id) {
    $deleteContact = (new CompanyService())->deleteContact($id);
    if ($deleteContact) {
        (new HomeController())->viewAdmin('dashboard', ["name" => $_SESSION['user']]);
    }
    return null;
});

$router->get("/admin/edit-invoice/{id}", function ($id) {
    (new HomeController())->viewAdmin('invoices', ["name" => $_SESSION['user'], 'id' => $id]);
});

$router->post("/admin/add-invoice", function () {
    $invoice = (new CompanyService())->createInvoice($_POST['id'], $_POST['company_id'], $_POST['ref']);
    if ($invoice) {
        (new HomeController())->viewAdmin('dashboard', ["name" => $_SESSION['user']]);
    }
    return null;
});

$router->post("/admin/delete-invoice/{id}", function ($id) {
    $deleteInvoice = (new CompanyService())->deleteInvoice($id);
    if ($deleteInvoice) {
        (new HomeController())->viewAdmin('dashboard', ["name" => $_SESSION['user']]);
    }
    return null;
});

// || End of admin related post requests
// || End of admin routes

// || Start of frontend related routes
$router->get('/get-companies', function () {
    return (new CompanyService())->getAllCompanies(false);
});

$router->get('/get-latest-companies', function () {
    return (new CompanyService())->getAllCompanies(true);
});

// || Start Company related routes
$router->get("/get-company/{id}", function ($id) {
    return (new CompanyService())->getCompanyById($id);
});
// End of company related routes

// || Start of contact routes
$router->get("/get-contacts", function () {
    return (new CompanyService())->getAllContacts(false);
});
// || Start of contact routes
$router->get("/get-latest-contacts", function () {
    return (new CompanyService())->getAllContacts(true);
});

$router->get("/get-contacts/company/{company_id}", function ($company_id) {
    return (new CompanyService())->getAllContactsByCompany($company_id);
});

$router->get("/get-contact/{id}", function ($id) {
    return (new CompanyService())->getContactById($id);
});

// ||
// End of contact routes

// || Start of invoice routes

$router->get('/get-invoices', function () {
    return (new CompanyService())->getAllInvoices(false);
});

$router->get('/get-latest-invoices', function () {
    return (new CompanyService())->getAllInvoices(true);
});

$router->get("/get-invoices/company/{company_id}", function ($company_id) {
    return (new CompanyService())->getInvoicesByCompany($company_id);
});

$router->get("/get-invoice/{id}", function ($id) {
    return (new CompanyService())->getInvoiceById($id);
});
// || End of invoice routes
// || End of frontend related routes

$router->run();