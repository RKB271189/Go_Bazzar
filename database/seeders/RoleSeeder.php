<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            [
                'guard_name' => config('auth.defaults.guard'),
                'name' => 'admin'
            ],
            [
                'guard_name' => config('auth.defaults.guard'),
                'name' => 'demo'
            ],
            [
                'guard_name' => config('auth.defaults.guard'),
                'name' => 'user'
            ]
        ]);
    }
}
