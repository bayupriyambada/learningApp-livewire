<?php

namespace App\Http\Livewire\Administrator\Pages\Routes;

use App\Models\GradeLevelModel;
use Livewire\Component;

class CheckStudentGrade extends Component
{
    public $gradeLevel;
    public $search;

    public function mount($id)
    {
        $this->gradeLevel = GradeLevelModel::query()->whereHas('students', function ($query) {
            $query->where('is_active', 1)
                ->where('name', 'like', '%' . $this->search . '%')
                ->orderBy('nik', 'asc');
        })->findOrFail(decrypt($id));
    }
    public function render()
    {
        return view('livewire.administrator.pages.routes.check-student-grade',)->extends('template.pages.app');
    }
}
