<?php
namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


final class RoutesTest extends TestCase
{
    private $client;

    protected function setUp(): void
    {
        parent::setup();

        $this->client = new Client(["base_uri" => "http://localhost:8000/"]);
    }

    public function testGetCompanies()
    {
        $res = $this->client->request("GET", "/get-companies", ['http_errors' => false]);
        $data = json_decode($res->getBody(), TRUE);

        $this->assertEquals(200, $res->getStatusCode());
        $this->assertArrayHasKey("companies", $data);
    }

    public function testGetLatestCompanies()
    {

        $res = $this->client->request("GET", "/get-latest-companies", ['http_errors' => false]);
        $data = json_decode($res->getBody(), TRUE);

        $this->assertEquals(200, $res->getStatusCode());
        $this->assertArrayHasKey("companies", $data);
    }

    public function testGetCompanyById()
    {
        $res = $this->client->request("GET", "/get-company/5", ['http_errors' => false]);
        $data = json_decode($res->getBody(), TRUE);

        $this->assertEquals(200, $res->getStatusCode());
        $this->assertArrayHasKey("company", $data);
    }

    public function testGetCompanyByIdHandlesIncorectId()
    {
        $res = $this->client->request("GET", "/get-company/po", ['http_errors' => false]);

        $this->assertEquals(400, $res->getStatusCode());
    }


    public function testGetInvoices()
    {
        $res = $this->client->request("GET", "/get-invoices", ['http_errors' => false]);
        $data = json_decode($res->getBody(), TRUE);

        $this->assertEquals(200, $res->getStatusCode());
        $this->assertArrayHasKey("invoices", $data);
    }

    public function testGetLatestInvoices()
    {
        $res = $this->client->request("GET", "/get-latest-invoices", ['http_errors' => false]);
        $data = json_decode($res->getBody(), TRUE);

        $this->assertEquals(200, $res->getStatusCode());
        $this->assertArrayHasKey("invoices", $data);
    }

    public function testGetInvoicesByCompany()
    {
        $res = $this->client->request("GET", "/get-invoices/company/20", ['http_errors' => false]);
        $data = json_decode($res->getBody(), TRUE);

        $this->assertEquals(200, $res->getStatusCode());
        $this->assertArrayHasKey("invoices", $data);
    }

    public function testGetInvoicesByCompanyHandlesIncorrectId()
    {
        $res = $this->client->request("GET", "/get-invoices/company/helloWorld", ['http_errors' => false]);

        $this->assertEquals(400, $res->getStatusCode());
    }

    public function testGetInvoicesById()
    {
        $res = $this->client->request("GET", "/get-invoice/8", ['http_errors' => false]);
        $data = json_decode($res->getBody(), TRUE);

        $this->assertEquals(200, $res->getStatusCode());
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
        $res = $this->client->request("GET", "/get-contacts", ['http_errors' => false]);
        $data = json_decode($res->getBody(), TRUE);

        $this->assertEquals(200, $res->getStatusCode());
        $this->assertArrayHasKey("contacts", $data);
    }

    public function testGetLatestContacts()
    {
        $res = $this->client->request("GET", "/get-latest-contacts", ['http_errors' => false]);
        $data = json_decode($res->getBody(), TRUE);

        $this->assertEquals(200, $res->getStatusCode());
        $this->assertArrayHasKey("contacts", $data);
    }

    public function testGetContactById()
    {
        $res = $this->client->request("GET", "/get-contact/8", ['http_errors' => false]);
        $data = json_decode($res->getBody(), TRUE);

        $this->assertEquals(200, $res->getStatusCode());
        $this->assertArrayHasKey("contact", $data);
    }

    public function testGetContactByIdHandlesIncorrectId()
    {
        $res = $this->client->request("GET", "/get-contact/@", ['http_errors' => false]);

        $this->assertEquals(400, $res->getStatusCode());
    }

    public function testGetContactByCompany()
    {
        $res = $this->client->request("GET", "/get-contacts/company/55", ['http_errors' => false]);
        $data = json_decode($res->getBody(), TRUE);

        $this->assertEquals(200, $res->getStatusCode());
        $this->assertArrayHasKey("contacts", $data);
    }

    public function testGetContactByCompanyHandlesIncorrectId()
    {
        $res = $this->client->request("GET", "/get-contacts/company/hello", ['http_errors' => false]);

        $this->assertEquals(400, $res->getStatusCode());
    }

    public function testAdmin()
    {
        // Create mock class for session
        $_SESSION["user"] = "ranu";

        $res = $this->client->request("GET", "/admin/get-latest-companies", ['http_errors' => false]);

        $this->assertEquals(200, $res->getStatusCode());

    }
}