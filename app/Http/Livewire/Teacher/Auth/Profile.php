<?php

namespace App\Http\Livewire\Teacher\Auth;

use App\Models\TeacherModel;
use Livewire\Component;

class Profile extends Component
{
    public $name;
    public $email;
    public $phoneNumber;
    public $nik;
    public $dataId;

    public function mount()
    {
        $teacherData = TeacherModel::where('id', auth()->guard('teacher')->user()->id)->first();
        $this->name = $teacherData->name;
        $this->email = $teacherData->email;
        $this->phoneNumber = $teacherData->phone_number;
        $this->nik = $teacherData->nik;
    }
    public function render()
    {
        return view('livewire.teacher.auth.profile');
    }
}
