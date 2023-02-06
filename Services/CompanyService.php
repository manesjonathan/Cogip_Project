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

        return;
    }

    public function getLastFiveCompanies()
    {
        $data["companies"] = $this->company_repository->getLastFiveCompanies();
        $json_encode = json_encode($data, true);

        //header('Content-type: application/json');
        return $data["companies"];
    }

    public function getCompanyById($id)
    {
        if (!is_numeric($id)) {
            header('Content-type: application/json');
            http_response_code(400);

            echo json_encode(["status" => "Bad Request"]);
            exit();
        }
        $id = intval($id);

        $data["status"] = "ok";
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
        if (!is_numeric($id)) {
            header('Content-type: application/json');
            http_response_code(400);

            echo json_encode(["status" => "Bad Request"]);
            exit();
        }
        $id = intval($id);

        $data["contact"] = $this->company_repository->getCompanyById($id);
        $json_encode = json_encode($data, true);

        header('Content-type: application/json');
        echo $json_encode;
    }

    public function getAllContactsByCompany($company)
    {
        if (!is_numeric($company)) {
            header('Content-type: application/json');
            http_response_code(400);

            echo json_encode(["status" => "Bad Request"]);
            exit();
        }
        $company = intval($company);

        $data["contacts"] = $this->company_repository->getAllContactsByCompany($company);
        $json_encode = json_encode($data, true);

        header('Content-type: application/json');
        echo $json_encode;
    }

    public function getLastFiveContactsByCompany($company)
    {
        if (!is_numeric($company)) {
            header('Content-type: application/json');
            http_response_code(400);

            echo json_encode(["status" => "Bad Request"]);
            exit();
        }
        $company = intval($company);

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
        if (!is_numeric($id)) {
            header('Content-type: application/json');
            http_response_code(400);

            echo json_encode(["status" => "Bad Request"]);
            exit();
        }
        $id = intval($id);
        $data["invoice"] = $this->company_repository->getInvoiceById($id);
        $json_encode = json_encode($data, true);

        header('Content-type: application/json');
        echo $json_encode;
    }

    public function getLastFiveInvoicesByCompany($company)
    {
        if (!is_numeric($company)) {
            header('Content-type: application/json');
            http_response_code(400);

            echo json_encode(["status" => "Bad Request"]);
            exit();
        }
        $company = intval($company);

        $data["invoices"] = $this->company_repository->getLastFiveInvoicesByCompany($company);
        $json_encode = json_encode($data, true);

        header('Content-type: application/json');
        echo $json_encode;
    }

    public function getInvoicesByCompany($company)
    {
        if (!is_numeric($company)) {
            header('Content-type: application/json');
            http_response_code(400);

            echo json_encode(["status" => "Bad Request"]);
            exit();
        }
        $company = intval($company);

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