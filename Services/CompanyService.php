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


    public function createCompany($array)
    {

        return; // Todo: return boolean true on succes, false on failure
    }
    
    public function getLastFiveCompanies()
    {
        return; // Todo: return array
    } 
    
    public function getCompanyById($id){
        return; // Todo: return company array
    }

    public function createContact($array)
    {
        return; // Todo: return boolean true on succes, false on failure
    }

    public function getAllContacts()
    {
        return; // Todo: return Array of company
    } 

    public function getContactById($id)
    {
        return; // Todo: return array contact
    }

    public function getAllContactsByCompany($company)
    {
        return; // Todo: return array of all contacts
    }

    public function getLastFiveContactsByCompany($company)
    {
        return; // Todo: return array of contact
    }
        
    public function createInvoice($array)
    {
        return; // Todo: return boolean true on succes, false on failure
    }

    public function getInvoiceById($id) 
    {
        return; // Todo: retrun Invoice array
    }

    public function getLastFiveInvoicesByCompany($company)
    {
        return; // Todo: return array of invoices
    } 

    public function getInvoicesByCompany($company)
    {
        return; // Todo: return array of invoices
    }

    // function getData() -> return to frontend if user is valid
    //return json object containing 3 arrays (last 5 invoices, last 5 contact, last 5 companies)
    public function getData()
    {
        /*

                $contacts = $this->company_repository->getLastFiveContacts();
                $data['invoices'] = $invoices;
                $data['contacts'] = $contacts;*/
        $data = [];
        $companies = $this->company_repository->getAllCompanies();
        $data['companies'] = $companies;
        $json_encode = json_encode($data, true);

        echo $json_encode;//todo remove

        return $json_encode;

    }
}