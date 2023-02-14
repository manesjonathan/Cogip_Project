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

    public function getCompaniesTypes()
    {
        return $this->company_repository->getCompaniesTypes();
    }


    public function createCompany($type_id, $name, $country, $tva)
    {
        if (isset($_SESSION['user'])) {

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

            $result = $this->company_repository->createCompany($type_id, $name, $country, $tva);
            header("Location:/admin/dashboard");
            echo ($result) ? "Success" : "Failed to create invoice";

            return $result;
        }
        echo "There is an error";
        return false;
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

    public function createContact($company_id, $name, $email, $phone)
    {
        if (isset($_SESSION['user'])) {

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

            $result = $this->company_repository->createContact($company_id, $name, $email, $phone);
            header("Location:/admin/dashboard");
            echo ($result) ? "Success" : "Failed to create invoice";
            return $result;
        }
        echo "There is an error";
        return false;
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

    public function createInvoice($id_company, $ref)
    {
        if (isset($_SESSION['user'])) {
            $isCompanyIdEmpty = ValidatorService::isInputEmpty($id_company);
            $isRefEmpty = ValidatorService::isInputEmpty($ref);

            if ($isCompanyIdEmpty || $isRefEmpty) {
                return false;
            }

            $id_company = ValidatorService::sanitize_text($id_company);
            $ref = ValidatorService::sanitize_text($ref);

            $result = $this->company_repository->createInvoice($ref, $id_company);
            header("Location:/admin/dashboard");
            echo ($result) ? "Success" : "Failed to create invoice";

            return $result;
        }
        echo "There is an error";
        return false;
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

    public function getLastFiveInvoices()
    {
        $data['invoices'] = $this->company_repository->getLast5Invoices();
        return $data['invoices'];
    }

    public function getAllInvoices($last_five)
    {
        $data['invoices'] = $this->company_repository->getAllInvoices();

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

}