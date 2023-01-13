<?php

namespace App\Http\Livewire\Administrator\Pages;

use App\Helpers\TextConditionHelpers;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Models\GradeLevelModel;
use Illuminate\Support\Facades\DB;

class GradeLevel extends Component
{
    public $grade;
    public $dataId;
    public $studentArray;
    public $dataRelation;

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
        $this->grade = null;
    }

    public function resetForms()
    {
        $this->grade = null;
        $this->resetErrorBag();
    }

    public function save()
    {
        $this->validate([
            'grade' => 'required|min:1',
        ]);

        DB::transaction(function () {
            GradeLevelModel::create([
                'id' => Str::uuid(),
                'grade' => $this->grade,
            ]);
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => TextConditionHelpers::GET_SAVED]
            );
            $this->dispatchBrowserEvent('hideModal');

            $this->resetFields();
        });
    }
    public function showEdit($data)
    {
        $this->dataId = $data['id'];
        $this->grade = $data['grade'];
        $this->dispatchBrowserEvent('showModalEdit');
    }
    public function edit()
    {
        DB::transaction(function () {
            GradeLevelModel::find($this->dataId)->update([
                'grade' => $this->grade,
            ]);
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => TextConditionHelpers::GET_UPDATED]
            );
            $this->dispatchBrowserEvent('hideModalEdit');
        });
    }

    public function showStudent($dataRelation)
    {
        $this->dataRelation = GradeLevelModel::with(['getStudent'])->where('id', $dataRelation)->first();
        // dd($data);
        // $this->dataId = $data['id'];
        // $this->studentArray = $data['get_student'];
        // dd($data);
        // $this->grade = $data['grade'];
        // dd($data);

        // $this->dataId = $data['id'];
        // $this->grade = $data['grade'];
        // $this->students = $data['students'];
        $this->dispatchBrowserEvent('showModalStudent');
    }

    public function showDelete($data)
    {
        $this->dataId = $data['id'];
        $this->grade = $data['grade'];
        $this->dispatchBrowserEvent('showModalDelete');
    }
    public function delete()
    {
        DB::transaction(function () {
            GradeLevelModel::find($this->dataId)->delete();
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => TextConditionHelpers::GET_DELETED]
            );
            $this->dispatchBrowserEvent('hideModalDelete');
        });
    }
    public function render()
    {
        return view('livewire.administrator.pages.grade-level', [
            'gradeLevel' => GradeLevelModel::with(['students'])->orderBy('grade', 'desc')->where('grade', 'like', '%' . $this->search . '%')->paginate(8)
        ]);
    }
}
