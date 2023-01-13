<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeLevelModel extends Model
{
    use HasFactory;
    protected $table = 'grade_levels';
    protected $guarded = [];

    public function students()
    {
        return $this->hasMany(StudentModel::class, 'grade_levels_id', 'id')->select('id', 'name', 'nik', 'email', 'grade_levels_id', 'is_active');
    }
}
