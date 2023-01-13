<?php

namespace App\Http\Livewire\Administrator\Pages;

use App\Models\CategoriesLessonModel;
use App\Models\GradeLevelModel;
use App\Models\StudentModel;
use App\Models\TeacherModel;
use Livewire\Component;

class Dashboard extends Component
{
    // public $teacher;
    // public $student;
    // public $gradeLevel;
    // public $categoriesLesson;

    protected $listeners = [
        'render' => '$refresh'
    ];
    public function render()
    {
        return view('livewire.administrator.pages.dashboard', [
            'teacher' => TeacherModel::query()->isActive()->count(),
            'student' => StudentModel::query()->isActive()->count(),
            'gradeLevel' => GradeLevelModel::query()->count(),
            'categoriesLesson' => CategoriesLessonModel::query()->count(),
        ]);
    }
}
