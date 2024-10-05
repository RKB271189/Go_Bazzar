<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Permission;
use App\Services\Role;
use Exception;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct(private Role $role, private Permission $permission) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = $this->role->getRoles();
        return response()->json(['roles' => $roles], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $params = $request->except('_method', '_token');
        $params['guard_name'] = 'api';
        $this->role->createRole($params);
        return response()->json(['message' => 'Role created succesfully'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = $this->role->getRole($id);
        return response()->json(['role' => $role], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $params = $request->except('_method', '_token');
        $params['id'] = $id;
        $this->role->updateRole($params);
        return response()->json(['message' => 'Role updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->role->deleteRole($id);
        return response()->json(['message' => 'Role deleted successfully'], 200);
    }
    /**
     * Fetching all permission list and also formating the response
     */
    public function permissions(string $id)
    {
        try {
            $role = $this->role->getRole($id);
            $permissions = $this->permission->getPermissions();
            $rolePermission = $role->permissions->pluck('id')->toArray();
            $permissionsWithChecked = $permissions->map(function ($permission) use ($rolePermission) {
                $permission->checked = in_array($permission->id, $rolePermission);
                return $permission;
            });
            return response()->json(["permission_with_checked" => $permissionsWithChecked], 200);
        } catch (Exception $ex) {
        }
    }

    public function assignPermissionToRole(Request $request)
    {
        try {
            $params = $request->only('permissionList', 'id');
            $permissionIds = implode(`","`, $params['permissionList']);
            $roleId = $params['id'];
            $role = $this->role->getRole($roleId);
            $permissionList = $this->permission->getPermissionByIds($permissionIds);
            return response()->json(["message" => "Permission assigned successfully"], 200);
        } catch (Exception $ex) {
        }
    }
}
