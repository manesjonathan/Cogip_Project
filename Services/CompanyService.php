<?php

namespace App\Services;

use App\Database\Repositories\CompanyRepository;

class CompanyService
{
    private $company_repository;

    public function __construct()
    {
        $this->company_repository = new CompanyRepository();
    }


//function createCompany($array)
//function getLastFiveCompanies() return array
//function getCompanyById($id) return Company

//function createContact($array)
//function getAllContacts() return array of Company
//function getContactById($id) return Contact
//function getAllContactsByCompany($company) return array of Contact
//function getLastFiveContactsByCompany($company) return array of contact

//function createInvoice($array)
//function getInvoiceById($id) return Invoice
//function getLastFiveInvoicesByCompany($company) return array of invoices
//function getInvoicesByCompany($company) return array of invoices

    //function getData() -> return to frontend if user is valid
    //return json object containing 3 arrays (last 5 invoices, last 5 contact, last 5 companies)
    public function getData()
    {

/*        $data = [];

        $invoices = $this->company_repository->getLastFiveInvoices();
        $contacts = $this->company_repository->getLastFiveContacts();
        $data['companies'] = $companies;
        $data['invoices'] = $invoices;
        $data['contacts'] = $contacts;*/

        $companies = $this->company_repository->getAllCompanies();

        print_r($companies);

    }
}