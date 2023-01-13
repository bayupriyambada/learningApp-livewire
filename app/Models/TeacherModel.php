<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TeacherModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'teacher';
    protected $fillable = [
        "name",
        "email",
        "password",
        "education_degree",
        "nik",
        "biography",
        "address",
        "date_of_birth",
        "date_of_place",
        "phone_number",
        "images",
        "is_active"
    ];

    protected $hidden = [
        'password',
    ];

    public function scopeIsActive($value)
    {
        return $value->where('is_active', 1);
    }
}
