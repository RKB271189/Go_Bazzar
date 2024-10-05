<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    public function __construct(private Permission $permission)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = $this->permission->getPermissions();
        return response()->json(['permissions' => $permissions], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $params = $request->except('_method', '_token');
        $this->permission->createPermission($params);
        return response()->json(['message' => 'Permission created successfully'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permission = $this->permission->getPermission($id);
        return response()->json(['permission' => $permission], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->permission->deletePermission($id);
        return response()->json(['message' => 'Permission deleted successfully'], 200);
    }
}
