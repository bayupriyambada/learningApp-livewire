<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesLessonModel extends Model
{
    use HasFactory;

    protected $table = 'categories_lesson';
    protected $guarded = [];
}
