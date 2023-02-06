<?php

use App\Services\CompanyService;

$company_service = new CompanyService();
$companies = $company_service->getLastFiveCompanies();
$contacts = $company_service->getAllContacts(); //todo
$invoices = $company_service->getLastFiveInvoicesByCompany(1); //todo

?>

<main class="">

    <h2>Invoices</h2>

</main>