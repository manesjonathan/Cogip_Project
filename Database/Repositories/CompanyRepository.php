<?php

namespace App\Database\Repositories;

use App\Database\Database;
use PDO;

class CompanyRepository
{

    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAllCompanies()
    {
    $query = 'SELECT * FROM companies';
    $stmt = $this->db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
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