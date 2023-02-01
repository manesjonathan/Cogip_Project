<?php

namespace App\Database\Repositories;

use App\Database\Database;

class CompanyRepository
{

    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }
}
//function createCompany($array)
//function getLastFiveCompanies()
//function getCompanyById($id)

//function createContact($array)
//function getAllContacts()
//function getContactById($id)
//function getAllContactsByCompany($company)
//function getLastFiveContactsByCompany($company)

//function createInvoice($array)
//function getInvoiceById($id)
//function getLastFiveInvoicesByCompany($company)
//function getInvoicesByCompany($company)