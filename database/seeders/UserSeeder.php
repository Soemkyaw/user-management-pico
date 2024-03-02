<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_id = Role::select('id')->where('name','admin')->first();
        logger($role_id->id);
        $role_id = $role_id->id;

        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'phone' => '09900800700',
            'address' => 'yangon',
            'gender' => 'male',
            'is_active' => true,
            'role_id' => $role_id
        ]);
    }
}
