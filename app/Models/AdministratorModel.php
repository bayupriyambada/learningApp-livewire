<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdministratorModel extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'administrator';

    protected $guarded = [];

    protected $hidden = [
        'password',
    ];
}
