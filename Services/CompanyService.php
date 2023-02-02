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
        $data["companies"] = $this->company_repository->getLastFiveCompanies();
        $json_encode = json_encode($data, true);

        header('Content-type: application/json');
        echo $json_encode;
    } 
    
    public function getCompanyById($id){
        $data["company"] = $this->company_repository->getCompanyById($id);
        $json_encode = json_encode($data, true);

        header('Content-type: application/json');
        echo $json_encode;
    }

    public function createContact($array)
    {
        return; // Todo: return boolean true on succes, false on failure
    }

    public function getAllContacts()
    {
        $data["contacts"] = $this->company_repository->getAllContacts();
        $json_encode = json_encode($data, true);
        
        header('Content-type: application/json');
        echo $json_encode;
    } 

    public function getContactById($id)
    {
        $data["contact"] = $this->company_repository->getCompanyById($id);
        $json_encode = json_encode($data, true);
        
        header('Content-type: application/json');
        echo $json_encode;
    }

    public function getAllContactsByCompany($company)
    {
        $data["contacts"] = $this->company_repository->getAllContactsByCompany($company);
        $json_encode = json_encode($data, true);
        
        header('Content-type: application/json');
        echo $json_encode;
    }

    public function getLastFiveContactsByCompany($company)
    {
        $data["contacts"] = $this->company_repository->getLastFiveContactsByCompany($company);
        $json_encode = json_encode($data, true);
        
        header('Content-type: application/json');
        echo $json_encode;
    }
        
    public function createInvoice($array)
    {
        return; // Todo: return boolean true on succes, false on failure
    }

    public function getInvoiceById($id) 
    {
        $data["invoice"] = $this->company_repository->getInvoiceById($id);
        $json_encode = json_encode($data, true);
        
        header('Content-type: application/json');
        echo $json_encode;
    }

    public function getLastFiveInvoicesByCompany($company)
    {
        $data["invoices"] = $this->company_repository->getLastFiveInvoicesByCompany($company);
        $json_encode = json_encode($data, true);
        
        header('Content-type: application/json');
        echo $json_encode;
    } 

    public function getInvoicesByCompany($company)
    {
        $data["invoices"] = $this->company_repository->getInvoicesByCompany($company);
        $json_encode = json_encode($data, true);
        
        header('Content-type: application/json');
        echo $json_encode;
    }

    // function getData() -> return to frontend if user is valid
    //return json object containing 3 arrays (last 5 invoices, last 5 contact, last 5 companies)
    public function getData()
    {
        $data = [];
        $companies = $this->company_repository->getAllCompanies();
        $data['companies'] = $companies;
        $json_encode = json_encode($data, true);

        header('Content-type: application/json');
        echo $json_encode;
    }
}