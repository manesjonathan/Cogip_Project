<?php

namespace App\Database\Models;

class RolePermission
{

    private $id;
    private $permission_id;
    private $role_id;

    public function __construct($permission_id, $role_id)
    {
        $this->permission_id = $permission_id;
        $this->role_id = $role_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPermissionId()
    {
        return $this->permission_id;
    }

    public function setPermissionId($permission_id)
    {
        $this->permission_id = $permission_id;
    }

    public function getRoleId()
    {
        return $this->role_id;
    }

    public function setRoleId($role_id)
    {
        $this->role_id = $role_id;
    }
}