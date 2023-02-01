<?php

namespace App\Database\Models;

class Invoice
{
    private $id;
    private $ref;
    private $id_company;
    private $created_at;
    private $updated_at;


    public function __construct($id, $ref, $id_company)
    {
        $this->id = $id;
        $this->ref = $ref;
        $this->id_company = $id_company;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRef()
    {
        return $this->ref;
    }

    public function setRef($ref)
    {
        $this->ref = $ref;
    }

    public function getIdCompany()
    {
        return $this->id_company;
    }

    public function setIdCompany($id_company)
    {
        $this->id_company = $id_company;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }
}