<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nombre' => 'Admin',
            'Ap_paterno' => ' ',
            'Ap_materno' => ' ',
            'email' => 'admin@gestion.com.mx',
            'password' => bcrypt('secret'),
        ]);
    }
}
