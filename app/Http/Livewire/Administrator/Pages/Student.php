<?php

namespace App\Http\Livewire\Administrator\Pages;

use App\Helpers\TextConditionHelpers;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\StudentModel;
use Livewire\WithPagination;
use App\Models\GradeLevelModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Student extends Component
{
    public $name;
    public $email;
    public $password;
    public $passwordDefault = 'password';
    public $nik;
    public $biography;
    public $address;
    public $dateOfBirth;
    public $dateOfPlace;
    public $phoneNumber;
    public $grade_levels_id;
    public $grade;
    public $is_active;
    public $selectedGradeLevel = '';

    public $dataId;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;

    protected $queryString = ['search'];


    protected $listeners = [
        'resetForms'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->resetPage();
    }

    public function resetFields()
    {
        $this->name = $this->email =
            $this->password =
            $this->nik =
            $this->grade_levels_id = null;
    }

    public function resetForms()
    {
        $this->name = $this->email =
            $this->password =
            $this->nik =
            $this->grade_levels_id = null;
        $this->resetErrorBag();
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|min:1',
            'email' => 'required|min:1|unique:student,email',
            'nik' => 'required|min:1|unique:student,nik',
            'grade_levels_id' => 'required',
        ], [
            'name.required' => 'Nama lengkap harus diisikan.',
            'email.required' => 'Email harus diisikan.',
            'email.unique' => 'Email sudah digunakan.',
            'nik.unique' => 'Nik sudah digunakan.',
            'nik.required' => 'Nik harus diisikan.',
            'grade_levels_id.required' => 'Kelas harus dipilih.',
        ]);

        DB::transaction(function () {
            StudentModel::create([
                'name' => $this->name,
                'email' => $this->email,
                'nik' => $this->nik,
                'grade_levels_id' => $this->grade_levels_id,
                'password' => Hash::make('password'),
            ]);
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => TextConditionHelpers::GET_SAVED . ' ' . '<b>' . $this->passwordDefault . '</b>']
            );
            $this->dispatchBrowserEvent('hideModal');
            $this->resetFields();
        });
    }
    public function showEdit($data)
    {
        $this->dataId = $data['id'];
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->grade_levels_id = $data['grade_levels_id'];
        $this->nik = $data['nik'];
        $this->dispatchBrowserEvent('showModalEdit');
    }
    public function activate($id)
    {
        StudentModel::find($id)->update([
            'is_active' => 1
        ]);
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => TextConditionHelpers::GET_ACTIVE]
        );
    }
    public function edit()
    {
        DB::transaction(function () {
            StudentModel::find($this->dataId)->update([
                'name' => $this->name,
                'nik' => $this->nik,
                'grade_levels_id' => $this->grade_levels_id,
            ]);
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => TextConditionHelpers::GET_UPDATED]
            );
            $this->dispatchBrowserEvent('hideModalEdit');
            $this->resetFields();
        });
    }
    public function showDetail($data)
    {
        $this->dataId = $data['id'];
        $this->name = $data['name'];
        $this->nik = $data['nik'];
        $this->email = $data['email'];
        $this->biography = $data['biography'];
        $this->address = $data['address'];
        $this->dateOfBirth = $data['date_of_birth'];
        $this->dateOfPlace = $data['date_of_place'];
        $this->phoneNumber = $data['phone_number'];
        $this->grade = $data['grade_level']['grade'];
        $this->is_active = $data['is_active'];
        $this->dispatchBrowserEvent('showModalDetail');
    }

    public function showDelete($data)
    {
        $this->dataId = $data['id'];
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->nik = $data['nik'];
        $this->dispatchBrowserEvent('showModalDelete');
    }
    public function delete()
    {
        DB::transaction(function () {
            StudentModel::find($this->dataId)->delete();
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Data dengan nama ' . $this->name . ' berhasil dihapus!']
            );
            $this->dispatchBrowserEvent('hideModalDelete');
        });
    }
    public function render()
    {
        return view(
            'livewire.administrator.pages.student',
            [
                'students' => StudentModel::with(['gradeLevel'])->orderBy('created_at', 'desc')
                    ->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('nik', 'like', '%' . $this->search . '%')
                    ->paginate(8),
                'gradeLevels' => GradeLevelModel::get()
            ]
        );
    }
}
