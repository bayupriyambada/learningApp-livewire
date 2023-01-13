<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class StudentModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'student';
    protected $guarded = [];

    public function gradeLevel()
    {
        return $this->belongsTo(GradeLevelModel::class, 'grade_levels_id', 'id');
    }

    public function scopeIsActive($value)
    {
        return $value->where('is_active', 1);
    }
}
