<?php

require_once 'vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__."/Database");
$faker = Faker\Factory::create('fr_BE');
$faker->seed(1234);

$db_conn;
try{
    $dotenv->load();

    $db_conn = new PDO("mysql:host=".$_ENV["TEST_DB_HOST"].";dbname=".$_ENV["TEST_DB_NAME"]
                ,$_ENV["TEST_DB_USER"], $_ENV["TEST_DB_PASSWORD"]);
    $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
} catch(PDOException $e) {
    echo "Connection error: ".$e->getMessage();
    die();
}

function main($faker, $db_conn){
    echo "Starting data generation...";
    for ($i = 0; $i < 100; $i++){
        echo "Generating company...";
        $company = create_company($faker, $db_conn);

        $comp_query = "INSERT INTO companies (name, type_id, country, tva, created_at) 
                       VALUES(:name, :type_id, :country, :tva, :created_at)";
        $comp_stmt = $db_conn->prepare($comp_query);
        echo "Inserting company in the database";
        $comp_stmt->execute($company);

        echo "Generating contact...";
        $contact = create_contact($faker, $db_conn);
        $contact_query = "INSERT INTO contacts (name, company_id, email, phone, created_at)
                          VALUES (:name, :company_id, :email, :phone, :created_at)";
        $cont_stmt = $db_conn->prepare($contact_query);
        echo "Inserting contact in the database";
        $cont_stmt->execute($contact);

        echo "Generating invoice...";
        $invoice = create_invoice($faker, $db_conn);
        $invoice_query = "INSERT INTO invoices (ref, id_company, created_at)
                          VALUES (:ref, :id_company, :created_at)";
        $inv_stmt =  $db_conn->prepare($invoice_query);
        echo "Inserting invoice in the database";
        $inv_stmt->execute($invoice);
    }

    echo "Done";
}

function create_company($faker, $conn){
    $stmt = $conn->prepare("SELECT id from types");
    $stmt->execute();
    $ids = $stmt->fetchAll();
    $id = $ids[rand(0, count($ids)-1)];

    $tva = $faker->countryCode().$faker->numberBetween(100000000, 999999999);
    return [
        "name" => $faker->company(),
        "type_id" => $id["id"],
        "country" => $faker->country(),
        "tva" => $tva,
        "created_at" => genDateTime($faker)
    ];
}

function create_invoice($faker, $conn) {
    $stmt = $conn->prepare("SELECT id from companies");
    $stmt->execute();
    $ids = $stmt->fetchAll();

    $id = $ids[rand(0, count($ids)-1)];
    $ref = "F".$faker->numberBetween(20000000,29999999)."-".sprintf("%2d",$faker->numberBetween(0, 999));
    return [
        "ref" => $ref,
        "id_company" => $id["id"],
        "created_at" => genDateTime($faker)
    ];
} 


function create_contact($faker, $conn) {
    $stmt = $conn->prepare("SELECT id from companies");
    $stmt->execute();
    $ids = $stmt->fetchAll();
    
    $id = $ids[rand(0, count($ids)-1)];
    return [
        "name" => $faker->name(),
        "company_id" => $id["id"],
        "email" => $faker->email(),
        "phone" => $faker->phoneNumber(),
        "created_at" => genDateTime($faker)
    ];
}

function genDateTime($faker) {
    $dateTime = $faker->dateTimeThisDecade();
    return $dateTime->format("Y-m-d H:i:s");
}

main($faker, $db_conn);