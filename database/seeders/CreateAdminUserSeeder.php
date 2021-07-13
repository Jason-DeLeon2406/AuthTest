<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::create([
            "name" => "Default Admin",
            "email" => "admin@email.com",
            "password" => Hash::make('admin123456'),
        ]);
        $role = Role::create([
            "name" => "Admin",
        ]);

        $role1 = Role::create([
            "name" => "User"
        ]);

        $permissions = Permission::pluck("id", "id")->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
