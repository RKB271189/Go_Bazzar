<?php

namespace Database\Seeders;

use App\Models\User;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
        ];
        try {
            DB::beginTransaction();
            foreach ($permissions as $permission) {
                Permission::create(['name' => $permission, 'guard_name' => 'api']);
            }
            $user = User::create([
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin@passWord')
            ]);

            $role = Role::create(
                ['name' => 'admin', 'guard_name' => 'api'],
            );

            $permissions = Permission::pluck('id', 'id')->all();

            $role->syncPermissions($permissions);

            $user->assignRole([$role->id]);
            DB::commit();
        } catch (Exception $ex) {
            DB::rollBack();
        }
    }
}
