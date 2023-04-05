<?php

namespace App\Database\Models;

class Contact
{

    private $id;
    private $name;
    private $company_id;
    private $company_name;
    private $email;
    private $phone;
    private $created_at;
    private $updated_at;

    public function __construct($name, $company_id, $email, $phone)
    {
        $this->name = $name;
        $this->company_id = $company_id;
        $this->email = $email;
        $this->phone = $phone;
    }

    public function getId()
    {
        return $this->id;
    }


    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getCompanyId()
    {
        return $this->company_id;
    }

    public function setCompanyId($company_id)
    {
        $this->company_id = $company_id;
    }

    public function getCompanyName()
    {
        return $this->company_name;
    }

    public function setCompanyName($name)
    {
        $this->company_name = $name;
    }



    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}