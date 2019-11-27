<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Admin Users Crud',
            'slug' => 'admin.users',
            'description' => 'Crud users for admin'
        ]);

        Permission::create([
            'name' => 'Projects Crud',
            'slug' => 'projects',
            'description' => 'Crud projects'
        ]);

        Permission::create([
            'name' => 'Users documents upload',
            'slug' => 'documents.users',
            'description' => 'Upload documents by users'
        ]);

        Permission::create([
            'name' => 'Res documents panel',
            'slug' => 'documents.res',
            'description' => 'Documents panel for res'
        ]);

        Permission::create([
            'name' => 'Create comentary',
            'slug' => 'comment',
            'description' => 'Documents coments'
        ]);

    }
}
