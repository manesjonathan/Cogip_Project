<?php

namespace App\Database\Models;

class Company
{

    private $id;
    private $name;
    private $type_id;
    private $country;
    private $tva;
    private $created_at;
    private $updated_at;

    public function __construct($name, $type_id, $country, $tva)
    {
        $this->name = $name;
        $this->type_id = $type_id;
        $this->country = $country;
        $this->tva = $tva;
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

    public function getTypeId()
    {
        return $this->type_id;
    }

    public function setTypeId($type_id)
    {
        $this->type_id = $type_id;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function getTva()
    {
        return $this->tva;
    }

    public function setTva($tva)
    {
        $this->tva = $tva;
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