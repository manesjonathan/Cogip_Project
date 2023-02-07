<?php

namespace App\Services;

use App\Database\Repositories\CompanyRepository;

require "ValidatorService.php";

class CompanyService
{
    private $company_repository;

    public function __construct()
    {
        $this->company_repository = new CompanyRepository();
    }


    public function createCompany($array)
    {
        foreach($array as $data) {
            if (ValidatorService::isInputEmpty($data)) {
                return FALSE;
            }

            $data = ValidatorService::sanitize_text($data);
        }
        
        if (!(ValidatorService::isNumber($array["type_id"]) && ValidatorService::isAlphanumeric($array["tva"]))){
            return FALSE;
        };

        $array["type_id"] = intval($array["type_id"]);

        return $this->createCompany($array);
    }

    public function getLastFiveCompanies()
    {
        $data['companies'] = $this->company_repository->getLastFiveCompanies();
        if (isset($_SESSION['user'])) {
            return $data['companies'];
        }

        $json_encode = json_encode($data, true);
        header('Content-type: application/json');
        echo $json_encode;
        return true;
    }

    public function getCompanyById($id)
    {
        if (!ValidatorService::isNumber($id)) {
            header('Content-type: application/json');
            http_response_code(400);

            echo json_encode(["status" => "Bad Request"]);
            exit();
        }
        $id = intval($id);

        $data["status"] = "ok";
        $data["company"] = $this->company_repository->getCompanyById($id);
        if (isset($_SESSION['user'])) {
            return $data['company'];
        }

        $json_encode = json_encode($data, true);

        header('Content-type: application/json');
        echo $json_encode;
        return true;

    }

    public function createContact($array)
    {
        foreach($array as $data) {
            if (ValidatorService::isInputEmpty($data)) {
                return FALSE;
            }

            $data = ValidatorService::sanitize_text($data);
        }

        if (!ValidatorService::isNumber($array["company_id"])){
            return FALSE;
        }
        $array["company_id"] = intval($array["company_id"]);

        $array["email"] = ValidatorService::validateEmail($array["email"]);
        if (!$array["email"]){
            return FALSE;
        }

        $array["phone"] = ValidatorServie::isValidPhonenumber($array["phone"]);
        if (!$array["phone"]){
            return FALSE;
        }

        return $this->createContact($array);
    }

    public function getAllContacts()
    {
        $data["contacts"] = $this->company_repository->getAllContacts();
        if (isset($_SESSION['user'])) {
            return $data['contacts'];
        }

        $json_encode = json_encode($data, true);

        header('Content-type: application/json');
        echo $json_encode;
        return true;

    }

    public function getContactById($id)
    {
        if (!ValidatorService::isNumber($id)) {
            header('Content-type: application/json');
            http_response_code(400);

            echo json_encode(["status" => "Bad Request"]);
            exit();
        }
        $id = intval($id);

        $data["contact"] = $this->company_repository->getCompanyById($id);
        if (isset($_SESSION['user'])) {
            return $data['contact'];
        }

        $json_encode = json_encode($data, true);

        header('Content-type: application/json');
        echo $json_encode;
        return true;
    }

    public function getAllContactsByCompany($company)
    {
        if (!ValidatorService::isNumber($id)) {
            header('Content-type: application/json');
            http_response_code(400);

            echo json_encode(["status" => "Bad Request"]);
            exit();
        }
        $company = intval($company);

        $data["contacts"] = $this->company_repository->getAllContactsByCompany($company);
        if (isset($_SESSION['user'])) {
            return $data['contacts'];
        }

        $json_encode = json_encode($data, true);

        header('Content-type: application/json');
        echo $json_encode;
        return true;
    }

    public function getLastFiveContactsByCompany($company)
    {
        if (!ValidatorService::isNumber($id)) {
            header('Content-type: application/json');
            http_response_code(400);

            echo json_encode(["status" => "Bad Request"]);
            exit();
        }
        $company = intval($company);

        $data["contacts"] = $this->company_repository->getLastFiveContactsByCompany($company);
        if (isset($_SESSION['user'])) {
            return $data['contacts'];
        }

        $json_encode = json_encode($data, true);

        header('Content-type: application/json');
        echo $json_encode;
        return true;
    }

    public function createInvoice($array)
    {
        foreach($array as $data) {
            if (ValidatorService::isInputEmpty($data)) {
                return FALSE;
            }

            $data = ValidatorService::sanitize_text($data);
        }

        if (!ValidatorService::isNumber($array["company_id"])) {
            return FALSE;
        }
        $array["company_id"] = intval($array["company_id"]);

        if (!ValidatorService::isAlphaNumeric($array["ref"])){
            return FALSE;
        }

        return $this->createInvoice($array);
    }

    public function getInvoiceById($id)
    {
        if (!ValidatorService::isNumber($id)) {
            header('Content-type: application/json');
            http_response_code(400);

            echo json_encode(["status" => "Bad Request"]);
            exit();
        }
        $id = intval($id);
        $data["invoice"] = $this->company_repository->getInvoiceById($id);
        if (isset($_SESSION['user'])) {
            return $data['invoice'];
        }
        $json_encode = json_encode($data, true);

        header('Content-type: application/json');
        echo $json_encode;
        return true;
    }

    public function getLastFiveInvoicesByCompany($company)
    {
        if (!ValidatorService::isNumber($id)) {
            header('Content-type: application/json');
            http_response_code(400);

            echo json_encode(["status" => "Bad Request"]);
            exit();
        }
        $company = intval($company);

        $data["invoices"] = $this->company_repository->getLastFiveInvoicesByCompany($company);
        if (isset($_SESSION['user'])) {
            return $data['invoices'];
        }

        $json_encode = json_encode($data, true);

        header('Content-type: application/json');
        echo $json_encode;
        return true;
    }

    public function getInvoicesByCompany($company)
    {
        if (!ValidatorService::isNumber($id)) {
            header('Content-type: application/json');
            http_response_code(400);

            echo json_encode(["status" => "Bad Request"]);
            exit();
        }
        $company = intval($company);

        $data["invoices"] = $this->company_repository->getInvoicesByCompany($company);
        if (isset($_SESSION['user'])) {
            return $data['invoices'];
        }
        $json_encode = json_encode($data, true);

        header('Content-type: application/json');
        echo $json_encode;
        return true;
    }

    // function getData() -> return to frontend if user is valid
    //return json object containing 3 arrays (last 5 invoices, last 5 contact, last 5 companies)
    public function getData()
    {
        $data = [];
        $companies = $this->company_repository->getAllCompanies();
        $data['companies'] = $companies;
        if (isset($_SESSION['user'])) {
            return $data['companies'];
        }
        $json_encode = json_encode($data, true);

        header('Content-type: application/json');
        echo $json_encode;
        return true;
    }

    public function deleteCompany($company_id)
    {
        header('Content-type: application/json');

        if (!ValidatorService::isNumber($company_id)){
            echo $json_encode(["id" => "not valid"]) ;
            exit();
        }
        $company_id = intval($company_id);
        $status = $this->company_repository->deleteCompany($company_id);

        echo $status ? json_encode(["status" => "ok"]) : json_encode(["status" => "failed"]);
        exit();
    }

    public function deleteContact($contact_id)
    {
        header('Content-type: application/json');

        if (!ValidatorService::isNumber($contact_id)){
            echo json_encode(["id" => "not valid"]);
        }
        $contact_id = intval($contact_id);
        $status = $this->company_repository->deleteContact($contact_id);

        echo $status ? json_encode(["status" => "ok"]) : json_encode(["status" => "failed"]);
        exit();
    }

    public function deleteInvoice($invoice_id)
    {
        header('Content-type: application/json');

        if (!ValidatorService::isNumber($invoice_id)){
             echo json_encode(["id" => "not valid"]);
        }
        $invoice_id = intval($invoice_id);
        $status = $this->company_repository->deleteInvoice($invoice_id);

        echo $status ? json_encode(["status" => "ok"]) : json_encode(["status" => "failed"]);
        exit();
    }


}