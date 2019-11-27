<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Caffeinated\Shinobi\Traits\ShinobiTrait;

class User extends Authenticatable
{
    use Notifiable, ShinobiTrait;

    protected $fillable = [
        'nombre', 'Ap_paterno', 'Ap_materno', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

}
