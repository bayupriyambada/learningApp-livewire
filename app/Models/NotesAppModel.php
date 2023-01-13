<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotesAppModel extends Model
{
    use HasFactory;
    protected $table = 'notes_app';
    protected $guarded = [];

    public static function scopeUserById($user, $value)
    {
        return $user->where('teacher_id', $value);
    }
    public function scopeIsTodo($todo)
    {
        return $todo->where('status', 'TODO');
    }
    public function scopeIsProgress($progress)
    {
        return $progress->where('status', 'INPROGRESS');
    }
    public function scopeIsCompleted($completed)
    {
        return $completed->where('status', 'COMPLETED');
    }
}
