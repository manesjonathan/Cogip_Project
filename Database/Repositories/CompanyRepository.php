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

    public function createCompany($array) {
        $query = 'INSERT INTO companies (name, type_id, country, tva) 
                  VALUES (:name, :type_id, :country, :tva)';

        $stmt = $thid->db->prepare($query);
        return $stmt->execute($array);
    }

    public function getLastFiveCompanies(){
       $query = 'SELECT * FROM companies 
                 ORDER BY created_at
                 LIMIT 5';
        $stmt = $this->db->prepare($query);
        $stmt->execute(PDO::FETCH_ASSOC);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCompanyById($id){
        $query = 'SELECT * FROM companies WHERE id=:id';
        $stmt = $this->db->prepare($query);
        $stmt->execute(PDO::FETCH_ASSOC);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function createContact($array) {
       $query = 'INSERT INTO contacts (name, company_id, email, phone)
                 VALUES (:name, :company_id, :email, :phone)';
        $stmt = $this->db->prepare($query);
        return $stmt->execute($array); 
    }

    public function getAllContacts(){
        $query = "SELECT * FROM contacts";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getContactById($id){
      $query = 'SELECT * FROM contacts WHERE id=:id';
      $stmt = $this->db->prepare($query);
      
      return $stmt->execute(["id" => $id]);
    }

    public function getAllContactsByCompany($company_id){
      $query = 'SELECT * FROM contacts
                WHERE company_id=:company_id
               ';
      $stmt = $this->db->prepare($query);
      $stmt->execute(['company_id' => $company_id]);

      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLastFiveContactsByCompany($company_id){
      $query = 'SELECT * FROM contacts 
                WHERE company_id=:company_id
                ORDER BY created_at 
                LIMIT 5';
      $stmt = $this->db->prepare($query);
      $stmt->execute(['company_id' => $company_id]);

      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function createInvoice($array){
      $query = 'INSERT INTO invoices (ref, id_company)  
                VALUES (:ref, :id_company)
               ';
      $stmt = $this->db->prepare($query);

      return $stmt->execute($array);
    }

    public function getInvoiceById($id){
      $query = 'SELECT * FROM invoices
                WHERE id=:id';
      $stmt = $this->db->prepare($query);
      $stmt->execute();

      return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getLastFiveInvoicesByCompany($company_id){
      $query = 'SELECT * FROM invoices
                WHERE id_company=:id_company
                ORDER BY created_at
                LIMIT 5
               ';
      $stmt = $this->db->prepare($query);
      $stmt->execute(['id_company' => $company_id]);

      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getInvoicesByCompany($company_id){
      $query = 'SELECT * FROM invoices
                WHERE id_company=:id_company
               ';
      $stmt = $this->db->prepare($query);
      $stmt->execute(['id_company' => $company_id]);

      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
