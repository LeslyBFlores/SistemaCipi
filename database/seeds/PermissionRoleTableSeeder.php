<?php

use Illuminate\Database\Seeder;
use App\Permission_role;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission_role::create([
            'permission_id' => '1',
            'role_id' => '1'
        ]);
        Permission_role::create([
            'permission_id' => '2',
            'role_id' => '2'
        ]);
        Permission_role::create([
            'permission_id' => '3',
            'role_id' => '4'
        ]);
        Permission_role::create([
            'permission_id' => '4',
            'role_id' => '3'
        ]);
        Permission_role::create([
            'permission_id' => '5',
            'role_id' => '3'
        ]);
        Permission_role::create([
            'permission_id' => '5',
            'role_id' => '4'
        ]);
    }
}
