<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $fes = Feature::all();
        $permissions = ['View','Create','Update','Delete'];

        foreach($fes as $f)
        {
            foreach($permissions as $permission)
            {
                Permission::create([
                    'name' => $permission,
                    'feature_id' => $f->id
                ]);
            }
        }
    }
}
