<?php

namespace App\Http\Livewire\Administrator\Pages;

use App\Helpers\TextConditionHelpers;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\TeacherModel;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\TeacherRequest;

class Teacher extends Component
{
    public $name;
    public $email;
    public $password;
    public $passwordDefault = 12345678;
    public $educationDegree;
    public $nik;
    public $biography;
    public $address;
    public $dateOfBirth;
    public $dateOfPlace;
    public $phoneNumber;
    public $is_active;

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
            $this->nik = null;
    }

    public function resetForms()
    {
        $this->name = $this->email =
            $this->password =
            $this->nik = null;
        $this->resetErrorBag();
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|min:1',
            'email' => 'required|min:1|unique:teacher,email',
            'nik' => 'required|min:1|unique:teacher,nik',
        ], [
            'name.required' => 'Nama lengkap harus diisikan.',
            'email.required' => 'Email harus diisikan.',
            'email.unique' => 'Email sudah digunakan.',
            'nik.unique' => 'Nik sudah digunakan.',
            'nik.required' => 'Nik harus diisikan.',
        ]);

        DB::transaction(function () {
            TeacherModel::create([
                'name' => $this->name,
                'email' => $this->email,
                'nik' => $this->nik,
                'password' => Hash::make('12345678'),
            ]);
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Guru telah ditambahkan, password default ' . '<b>' . $this->passwordDefault . '</b>']
            );
            $this->dispatchBrowserEvent('hideModal');
            $this->resetFields();
        });
    }
    public function showEdit($teacher)
    {
        $this->dataId = $teacher['id'];
        $this->name = $teacher['name'];
        $this->email = $teacher['email'];
        $this->nik = $teacher['nik'];
        $this->dispatchBrowserEvent('showModalEdit');
    }
    public function activate($id)
    {
        TeacherModel::find($id)->update([
            'is_active' => 1
        ]);
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Akun telah aktif!']
        );
    }
    public function edit()
    {
        DB::transaction(function () {
            TeacherModel::find($this->dataId)->update([
                'name' => $this->name,
                'nik' => $this->nik,
            ]);
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => TextConditionHelpers::GET_UPDATED]
            );
            $this->dispatchBrowserEvent('hideModalEdit');
            $this->resetFields();
        });
    }
    public function showDetail($teacher)
    {
        $this->dataId = $teacher['id'];
        $this->name = $teacher['name'];
        $this->nik = $teacher['nik'];
        $this->email = $teacher['email'];
        $this->educationDegree = $teacher['education_degree'];
        $this->biography = $teacher['biography'];
        $this->address = $teacher['address'];
        $this->dateOfBirth = $teacher['date_of_birth'];
        $this->dateOfPlace = $teacher['date_of_place'];
        $this->phoneNumber = $teacher['phone_number'];
        $this->is_active = $teacher['is_active'];
        $this->dispatchBrowserEvent('showModalDetail');
    }

    public function showDelete($categories)
    {
        $this->dataId = $categories['id'];
        $this->name = $categories['name'];
        $this->email = $categories['email'];
        $this->nik = $categories['nik'];
        $this->dispatchBrowserEvent('showModalDelete');
    }
    public function delete()
    {
        DB::transaction(function () {
            TeacherModel::find($this->dataId)->delete();
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Data dengan nama ' . $this->name . ' berhasil dihapus!']
            );
            $this->dispatchBrowserEvent('hideModalDelete');
        });
    }
    public function render()
    {
        return view('livewire.administrator.pages.teacher', [
            'teachers' => TeacherModel::orderBy('created_at', 'desc')
                ->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('nik', 'like', '%' . $this->search . '%')
                ->paginate(8)
        ]);
    }
}
