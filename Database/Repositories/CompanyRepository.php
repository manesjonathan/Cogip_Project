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
        $query = 'SELECT * FROM companies ORDER BY created_at DESC';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createCompany($id, $type_id, $name, $country, $tva)
    {
        // Check if contact already exists
        $query = 'SELECT * FROM companies WHERE id = :id';
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Contact already exists, update it
            $query = 'UPDATE companies SET name = :name, type_id = :type_id, country = :country, tva = :tva WHERE id = :id';
            $stmt = $this->db->prepare($query);
            return $stmt->execute(['name' => $name, 'type_id' => $type_id, 'country' => $country, 'tva' => $tva, 'id' => $result['id']]);
        } else {
            // Contact doesn't exist, insert new record
            $query = 'INSERT INTO companies (name, type_id, country, tva) VALUES (:name, :type_id, :country, :tva)';
            $stmt = $this->db->prepare($query);
            return $stmt->execute(['name' => $name, 'type_id' => $type_id, 'country' => $country, 'tva' => $tva]);
        }
    }

    public function getLastFiveCompanies()
    {
        $query = 'SELECT * FROM companies 
                 ORDER BY created_at DESC
                 LIMIT 5';
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCompanyById($id)
    {
        $query = 'SELECT * FROM companies WHERE id=:id';
        $stmt = $this->db->prepare($query);
        $stmt->execute(["id" => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createContact($contact_id, $company_id, $name, $email, $phone)
    {
        // Check if contact already exists
        $query = 'SELECT * FROM contacts WHERE id = :id';
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $contact_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Contact already exists, update it
            $query = 'UPDATE contacts SET name = :name, email = :email, phone = :phone, company_id = :company_id WHERE id = :id';
            $stmt = $this->db->prepare($query);
            return $stmt->execute(['name' => $name, 'email' => $email, 'phone' => $phone, 'company_id' => $company_id, 'id' => $result['id']]);
        } else {
            // Contact doesn't exist, insert new record
            $query = 'INSERT INTO contacts (name, company_id, email, phone) VALUES (:name, :company_id, :email, :phone)';
            $stmt = $this->db->prepare($query);
            return $stmt->execute(['name' => $name, 'company_id' => $company_id, 'email' => $email, 'phone' => $phone]);
        }
    }


    public function getCompaniesTypes()
    {
        $query = 'SELECT * FROM types';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllContacts()
    {
        $query = "SELECT * FROM contacts ORDER BY created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getContactById($id)
    {
        $query = 'SELECT * FROM contacts WHERE id=:id';
        $stmt = $this->db->prepare($query);
        $stmt->execute(["id" => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllContactsByCompany($id)
    {
        $query = 'SELECT * FROM contacts
                WHERE company_id=:company_id
               ';
        $stmt = $this->db->prepare($query);
        $stmt->execute(['company_id' => $id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLastFiveContactsByCompany($id)
    {
        $query = 'SELECT * FROM contacts 
                WHERE company_id=:company_id
                ORDER BY created_at 
                LIMIT 5';
        $stmt = $this->db->prepare($query);
        $stmt->execute(['company_id' => $id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createInvoice($id, $ref, $id_company)
    {
        // Check if contact already exists
        $query = 'SELECT * FROM invoices WHERE id = :id';
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Invoice already exists, update it
            $query = 'UPDATE invoices SET ref = :ref, id_company = :id_company WHERE id = :id';
            $stmt = $this->db->prepare($query);
            return $stmt->execute(['ref' => $ref, 'id_company' => $id_company, 'id' => $result['id']]);
        } else {
            // Invoice doesn't exist, insert new record
            $query = 'INSERT INTO invoices (ref, id_company) VALUES (:ref, :id_company)';
            $stmt = $this->db->prepare($query);
            return $stmt->execute(['ref' => $ref, 'id_company' => $id_company]);
        }
    }

    public function getInvoiceById($id)
    {
        $query = 'SELECT * FROM invoices
                WHERE id=:id';
        $stmt = $this->db->prepare($query);
        $stmt->execute(["id" => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getLastFiveInvoicesByCompany($company_id)
    {
        $query = 'SELECT * FROM invoices
                WHERE id_company=:id_company
                ORDER BY created_at
                LIMIT 5
               ';
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id_company' => $company_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLast5Invoices()
    {
        $query = 'SELECT *  FROM invoices ORDER BY created_at DESC LIMIT 5';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllInvoices()
    {
        $query = 'SELECT *  FROM invoices ORDER BY created_at DESC';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public
    function getInvoicesByCompany($company_id)
    {
        $query = 'SELECT * FROM invoices
                WHERE id_company=:id_company
               ';
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id_company' => $company_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteCompany($id)
    {
        $query = 'SET FOREIGN_KEY_CHECKS=0;
                DELETE FROM companies WHERE id = :id; 
                SET FOREIGN_KEY_CHECKS=0';
        $stmt = $this->db->prepare($query);
        return $stmt->execute(['id' => $id]);
    }

    public function deleteInvoice($id)
    {
        $query = 'DELETE FROM invoices WHERE id = :id';
        $stmt = $this->db->prepare($query);
        return $stmt->execute(['id' => $id]);
    }

    public function deleteContact($id)
    {
        $query = 'DELETE FROM contacts WHERE id = :id';
        $stmt = $this->db->prepare($query);
        return $stmt->execute(['id' => $id]);
    }
}
