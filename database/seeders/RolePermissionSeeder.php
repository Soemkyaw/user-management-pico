<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin = Role::where('name', 'admin')->first();

        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            $admin->permissions()->attach($permission);
        }
    }
}
