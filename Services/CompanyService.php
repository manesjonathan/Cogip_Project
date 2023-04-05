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

    public function getCompaniesTypes()
    {
        return $this->company_repository->getCompaniesTypes();
    }


    public function createCompany($id, $type_id, $name, $country, $tva)
    {
        if (!isset($_SESSION['user'])) {
            echo "There is an error";
            return false;
        }

        $isTypeIdEmpty = ValidatorService::isInputEmpty($type_id);
        $isNameEmpty = ValidatorService::isInputEmpty($name);
        $isCountryEmpty = ValidatorService::isInputEmpty($country);
        $isTva = ValidatorService::isInputEmpty($tva);

        if ($isTypeIdEmpty || $isNameEmpty || $isCountryEmpty || $isTva) {
            return false;
        }

        $type_id = ValidatorService::sanitize_text($type_id);
        $name = ValidatorService::sanitize_text($name);
        $country = ValidatorService::sanitize_text($country);
        $tva = ValidatorService::sanitize_text($tva);

        return $this->company_repository->createCompany($id, $type_id, $name, $country, $tva);
    }

    public function getAllCompanies($last_five)
    {
        $data['companies'] = $this->company_repository->getAllCompanies();

        if (isset($_SESSION['user'])) {
            return $data['companies'];
        }
        if ($last_five === true) {
            $data['companies'] = array_slice($data['companies'], 0, 5);

        }
        $json_encode = json_encode($data, true);
        header('Content-type: application/json');
        echo $json_encode;
        return true;
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

    public function createContact($contact_id, $company_id, $name, $email, $phone)
    {
        if (!isset($_SESSION['user'])) {
            echo "There is an error";
            return false;
        }

        $isCompanyEmpty = ValidatorService::isInputEmpty($company_id);
        $isNameEmpty = ValidatorService::isInputEmpty($name);
        $isEmailEmpty = ValidatorService::isInputEmpty($email);
        $isPhoneEmpty = ValidatorService::isInputEmpty($phone);


        if ($isCompanyEmpty || $isNameEmpty || $isEmailEmpty || $isPhoneEmpty) {
            return false;
        }

        $company_id = ValidatorService::sanitize_text($company_id);
        $name = ValidatorService::sanitize_text($name);
        $email = ValidatorService::sanitize_text($email);
        $phone = ValidatorService::sanitize_text($phone);

        if (!ValidatorService::validateEmail($email)) {
            return false;
        }
        return $this->company_repository->createContact($contact_id, $company_id, $name, $email, $phone);
    }

    public function getAllContacts($last_five)
    {
        $data['contacts'] = $this->company_repository->getAllContacts();

        if (isset($_SESSION['user'])) {
            return $data['contacts'];
        }
        if ($last_five === true) {
            $data['contacts'] = array_slice($data['contacts'], 0, 5);

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

        $data["contact"] = $this->company_repository->getContactById($id);
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
        if (!ValidatorService::isNumber($company)) {
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

    public function getLastFiveContactsByCompany($id)
    {
        if (!ValidatorService::isNumber($id)) {
            header('Content-type: application/json');
            http_response_code(400);

            echo json_encode(["status" => "Bad Request"]);
            exit();
        }
        $company = intval($id);

        $data["contacts"] = $this->company_repository->getLastFiveContactsByCompany($company);
        if (isset($_SESSION['user'])) {
            return $data['contacts'];
        }

        $json_encode = json_encode($data, true);

        header('Content-type: application/json');
        echo $json_encode;
        return true;
    }

    public function createInvoice($id, $id_company, $ref)
    {
        if (!isset($_SESSION['user'])) {
            echo "There is an error";
            return false;
        }
        $isCompanyIdEmpty = ValidatorService::isInputEmpty($id_company);
        $isRefEmpty = ValidatorService::isInputEmpty($ref);

        if ($isCompanyIdEmpty || $isRefEmpty) {
            return false;
        }

        $id_company = ValidatorService::sanitize_text($id_company);
        $ref = ValidatorService::sanitize_text($ref);

        return $this->company_repository->createInvoice($id, $ref, $id_company);
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

    public function getLastFiveInvoicesByCompany($id)
    {
        if (!ValidatorService::isNumber($id)) {
            header('Content-type: application/json');
            http_response_code(400);

            echo json_encode(["status" => "Bad Request"]);
            exit();
        }
        $company = intval($id);

        $data["invoices"] = $this->company_repository->getLastFiveInvoicesByCompany($company);
        if (isset($_SESSION['user'])) {
            return $data['invoices'];
        }

        $json_encode = json_encode($data, true);

        header('Content-type: application/json');
        echo $json_encode;
        return true;
    }

    public function getLastFiveInvoices()
    {
        $data['invoices'] = $this->company_repository->getLast5Invoices();
        return $data['invoices'];
    }

    public function getAllInvoices($last_five)
    {
        $data['invoices'] = $this->company_repository->getAllInvoices();

        foreach ($data['invoices'] as $key => $elem) {
            $companyById = $this->company_repository->getCompanyById($elem['id_company']);
            $data['invoices'][$key]['name'] = $companyById['name'];
        }

        if (isset($_SESSION['user'])) {
            return $data['invoices'];
        }

        if ($last_five === true) {
            $data['invoices'] = array_slice($data['invoices'], 0, 5);

        }
        $json_encode = json_encode($data, true);
        header('Content-type: application/json');
        echo $json_encode;
        return true;
    }


    public function getInvoicesByCompany($company)
    {
        if (!ValidatorService::isNumber($company)) {
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

    public function deleteCompany($id)
    {
        return $this->company_repository->deleteCompany($id);
    }

    public function deleteInvoice($id)
    {
        return $this->company_repository->deleteInvoice($id);
    }

    public function deleteContact($id)
    {
        return $this->company_repository->deleteContact($id);
    }
}