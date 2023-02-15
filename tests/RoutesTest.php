<?php

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

final class RoutesTest extends TestCase
{
    /*
        protected function setUp(): void
        {
            parent::setUp();
            session_start();
            $_SESSION['user'] = [
                'id' => 1,
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'role' => 'admin'
            ];
        }

        public function testDashboardPage()
        {
            $client = new Client(["base_uri" => "http://localhost:8000/"]);
            $res = $client->request("GET", "/admin/get-latest-companies", ['http_errors' => false, 'headers' => [
                'Cookie' => 'PHPSESSID=' . session_id()
            ]]);
            $this->assertEquals(200, $res->getStatusCode());
        }

        public function testLoginPage()
        {
            $client = new Client(["base_uri" => "http://localhost:8000/"]);
            $res = $client->request("GET", "/", ['http_errors' => false]);

            $this->assertEquals(200, $res->getStatusCode());
        }
    */

    public function testGetCompanies()
    {
        $client = new Client(["base_uri" => "http://localhost:8000/"]);
        $res = $client->request("GET", "/get-companies", ['http_errors' => false]);

        $this->assertEquals(200, $res->getStatusCode());
        $data = json_decode($res->getBody(), TRUE);
        $this->assertArrayHasKey("companies", $data);
    }

    public function testGetLatestCompanies()
    {
        $client = new Client(["base_uri" => "http://localhost:8000/"]);
        $res = $client->request("GET", "/get-latest-companies", ['http_errors' => false]);

        $this->assertEquals(200, $res->getStatusCode());
        $data = json_decode($res->getBody(), TRUE);
        $this->assertArrayHasKey("companies", $data);
    }

    public function testGetCompanyById()
    {
        $client = new Client(["base_uri" => "http://localhost:8000/"]);
        $res = $client->request("GET", "/get-company/5", ['http_errors' => false]);

        $this->assertEquals(200, $res->getStatusCode());
        $data = json_decode($res->getBody(), TRUE);
        $this->assertArrayHasKey("company", $data);
    }

    public function testGetCompanyByIdHandlesIncorectId()
    {
        $client = new Client(["base_uri" => "http://localhost:8000/"]);
        $res = $client->request("GET", "/get-company/po", ['http_errors' => false]);

        $this->assertEquals(400, $res->getStatusCode());
    }


    public function testGetInvoices()
    {
        $client = new Client(["base_uri" => "http://localhost:8000/"]);
        $res = $client->request("GET", "/get-invoices", ['http_errors' => false]);
        $this->assertEquals(200, $res->getStatusCode());
        $data = json_decode($res->getBody(), TRUE);
        $this->assertArrayHasKey("invoices", $data);
    }

    public function testGetLatestInvoices()
    {
        $client = new Client(["base_uri" => "http://localhost:8000/"]);
        $res = $client->request("GET", "/get-latest-invoices", ['http_errors' => false]);
        $this->assertEquals(200, $res->getStatusCode());
        $data = json_decode($res->getBody(), TRUE);
        $this->assertArrayHasKey("invoices", $data);
    }

    public function testGetInvoicesByCompany()
    {
        $client = new Client(["base_uri" => "http://localhost:8000/"]);
        $res = $client->request("GET", "/get-invoices/company/20", ['http_errors' => false]);
        $this->assertEquals(200, $res->getStatusCode());
        $data = json_decode($res->getBody(), TRUE);
        $this->assertArrayHasKey("invoices", $data);
    }

    public function testGetInvoicesByCompanyHandlesIncorrectId()
    {
        $client = new Client(["base_uri" => "http://localhost:8000/"]);
        $res = $client->request("GET", "/get-invoices/company/helloWorld", ['http_errors' => false]);
        $this->assertEquals(400, $res->getStatusCode());
    }

    public function testGetInvoicesById()
    {
        $client = new Client(["base_uri" => "http://localhost:8000/"]);
        $res = $client->request("GET", "/get-invoice/8", ['http_errors' => false]);
        $this->assertEquals(200, $res->getStatusCode());
        $data = json_decode($res->getBody(), TRUE);
        $this->assertArrayHasKey("invoice", $data);
    }

    public function testGetInvoicesByIdHandlesIncorrectId()
    {
        $client = new Client(["base_uri" => "http://localhost:8000/"]);
        $res = $client->request("GET", "/get-invoice/1+3", ['http_errors' => false]);
        $this->assertEquals(400, $res->getStatusCode());
    }

    public function testGetContacts()
    {
        $client = new Client(["base_uri" => "http://localhost:8000/"]);
        $res = $client->request("GET", "/get-contacts", ['http_errors' => false]);
        $this->assertEquals(200, $res->getStatusCode());
        $data = json_decode($res->getBody(), TRUE);
        $this->assertArrayHasKey("contacts", $data);
    }

    public function testGetLatestContacts()
    {
        $client = new Client(["base_uri" => "http://localhost:8000/"]);
        $res = $client->request("GET", "/get-latest-contacts", ['http_errors' => false]);
        $this->assertEquals(200, $res->getStatusCode());
        $data = json_decode($res->getBody(), TRUE);
        $this->assertArrayHasKey("contacts", $data);
    }

    public function testGetContactById()
    {
        $client = new Client(["base_uri" => "http://localhost:8000/"]);
        $res = $client->request("GET", "/get-contact/8", ['http_errors' => false]);
        $this->assertEquals(200, $res->getStatusCode());
        $data = json_decode($res->getBody(), TRUE);
        $this->assertArrayHasKey("contact", $data);
    }

    public function testGetContactByIdHandlesIncorrectId()
    {
        $client = new Client(["base_uri" => "http://localhost:8000/"]);
        $res = $client->request("GET", "/get-contact/@", ['http_errors' => false]);
        $this->assertEquals(400, $res->getStatusCode());
    }

    public function testGetContactByCompany()
    {
        $client = new Client(["base_uri" => "http://localhost:8000/"]);
        $res = $client->request("GET", "/get-contacts/company/55", ['http_errors' => false]);
        $this->assertEquals(200, $res->getStatusCode());
        $data = json_decode($res->getBody(), TRUE);
        $this->assertArrayHasKey("contacts", $data);
    }

    public function testGetContactByCompanyHandlesIncorrectId()
    {
        $client = new Client(["base_uri" => "http://localhost:8000/"]);
        $res = $client->request("GET", "/get-contacts/company/hello", ['http_errors' => false]);
        $this->assertEquals(400, $res->getStatusCode());
    }
}