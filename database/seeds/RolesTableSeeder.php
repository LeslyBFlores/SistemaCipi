<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Administrador',
            'slug' => 'admin'
        ]);
        Role::create([
            'name' => 'Gerente',
            'slug' => 'gerente'
        ]);
        Role::create([
            'name' => 'Responsable',
            'slug' => 'responsable'
        ]);
        Role::create([
            'name' => 'Usuario',
            'slug' => 'user'
        ]);
    }
}
