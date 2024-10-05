<?php

namespace App\Services;

use App\Services\Contracts\ServiceRepository;
use Spatie\Permission\Models\Role as ModelsRole;

final class Role extends ServiceRepository
{
    public function __construct(private ModelsRole $role)
    {
        parent::__construct($role);
    }
    public function createRole(array $params)
    {
        $this->role->create($params);
    }
    public function getRoles()
    {
        return $this->role->all();
    }
    public function getRole(string $id)
    {
        return $this->role->findById($id);
    }
    public function updateRole(array $params)
    {
        return $this->role->update($params);
    }
    public function deleteRole(string $id)
    {
        return $this->role->findById($id)->delete();
    }
}
