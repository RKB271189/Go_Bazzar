<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin@gmail#0011')
        ]);
        $admin->assignRole('admin');
        $demo = User::create([
            'email' => 'demo@gmail.com',
            'password' => Hash::make('demo@gmail#0011')
        ]);
        $demo->assignRole('demo');
    }
}
