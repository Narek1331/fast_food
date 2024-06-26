<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name','admin')->first();
        User::create([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => 'test@test.com',
            'role' => $adminRole->id,
        ]);
    }
}
