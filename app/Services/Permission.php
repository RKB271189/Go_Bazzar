<?php

namespace App\Services;

use App\Services\Contracts\ServiceRepository;
use Spatie\Permission\Models\Permission as ModelsPermission;

final class Permission extends ServiceRepository
{

    public function __construct(private ModelsPermission $permission)
    {
        parent::__construct($permission);
    }

    public function getPermissions()
    {
        return $this->permission->all();
    }
    public function getPermission(string $id)
    {
        return $this->permission->findById($id);
    }
    public function createPermission(array $params)
    {
        return $this->permission->create($params);
    }
    public function updatePermission(array $params)
    {
        return $this->permission->update($params);
    }
    public function deletePermission(string $id)
    {
        return $this->permission->findById($id)->delete();
    }
    public function getPermissionByIds(string $ids)
    {
        return $this->permission->whereIn($ids)->get();
    }
}
