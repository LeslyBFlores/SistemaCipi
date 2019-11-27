<?php

use Illuminate\Database\Seeder;
use App\Role_user;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role_user::create([
            'role_id' => '1',
            'user_id' => '1'
        ]);
    }
}
