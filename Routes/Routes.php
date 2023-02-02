<?php

namespace App\Routes;

use App\Services\CompanyService;
use Bramus\Router\Router;
use App\Controllers\HomeController;

$router = new Router();

//Login page
$router->get('/', function () {
    (new HomeController)->index();
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

// || Start Company related routes
$router->get("/get-company/{id}", function ($id) {
    return (new CompanyService())->getCompanyById($id);
});

$router->get("/last-five-companies", function () {
    return (new CompanyService())->getLastFiveCompanies();
});
// End of company related routes

// || Start of contact routes
$router->get("/get-all-contacts", function () {
    return (new CompanyService())->getAllContacts();
});

$router->get("/get-all-contacts/company/{company_id}", function ($company_id) {
    return (new CompanyService())->getAllContactsByCompany($company_id);
});

$router->get("/last-five-contacts/company/{company_id}", function ($company_id) {
    return (new CompanyService())->getLastFiveContactsByCompany($company_id);
});

$router->get("/get-contact/{id}", function ($id) {
    return (new CompanyService())->getContactById($id);
});
// End of contact routes

// || Start of invoice routes
$router->get("/get-invoices/{company_id}", function ($company_id) {
    return (new CompanyService())->getLastFiveInvoicesByCompany($company_id);
});

$router->get("/get-last-five-invoices/{company_id}", function ($company_id) {
    return (new CompanyService())->getLastFiveInvoicesByCompany($company_id);
});

$router->get("/get-invoice/{id}", function ($id) {
    return (new CompanyService())->getInvoiceById($id);
});
// || End of invoice routes


$router->run();