<?php
namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Database\Database;
use App\Database\Repositories\CompanyRepository;

class CompanyRepositoryTest extends TestCase
{

    // public function testCreatesCompany()
    // {
    //     $company_repo = new CompanyRepository();
    //     $db = Database::getInstance()->getConnection();

    //     // Test data
    //     $name = "Fancy Company";
    //     $country = "France";
    //     $tva = "TS631231000";
    //     $type_id = 1;

    //     // Insert test data into the database
    //     $result = $company_repo->createCompany($type_id, $name, $country, $tva);

    //     // Retrieve Last row from the database
    //     $query = "SELECT * FROM companies ORDER BY id DESC LIMIT 1";
    //     $stmt = $db->prepare($query);
    //     $stmt->execute();
    //     $values = $stmt->fetch(PDO::FETCH_ASSOC);

    //     // Compare test data from the database with the test data
    //     $diff = array_diff_assoc(["name" => $name, "type_id" => $type_id, "country" => $country, "tva" => $tva], $values);

    //     // Check if the insert query got executed
    //     $this->assertEquals(true, $result);

    //     // Check that there is no difference between the data
    //     $this->assertEmpty($diff);

    //     // Delete test data
    //     $id = $values["id"];
    //     $this->assertNotFalse($db->query("DELETE FROM invoices WHERE id=$id"));
    // }

    // public function testCreatesInvoices()
    // {
    //     $company_repo = new CompanyRepository();
    //     $db = Database::getInstance()->getConnection();

    //     // Test data
    //     $ref = "F23543605-000";
    //     $id_company = 55;

    //     // Insert test data into the database
    //     $result = $company_repo->createInvoice($ref, $id_company);

    //     // Retrieve data from the database
    //     $query = "SELECT * FROM invoices ORDER BY id DESC LIMIT 1";
    //     $stmt = $db->prepare($query);
    //     $stmt->execute();
    //     $values = $stmt->fetch(PDO::FETCH_ASSOC);

    //     // Compare test data from the database with the test data
    //     $diff = array_diff_assoc(["ref" => $ref, "id_company" => $id_company], $values);

    //     $this->assertEquals(true, $result);

    //     // Check that there is no difference between the data
    //     $this->assertEmpty($diff);

    //     // Delete test data
    //     $id = $values["id"];
    //     $this->assertNotFalse($db->query("DELETE FROM invoices WHERE id=$id"));
    // }
}