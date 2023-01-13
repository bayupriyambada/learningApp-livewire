<?php

namespace App\Http\Livewire\Administrator\Pages;

use Livewire\Component;
use App\Models\SchoolYearModel;
use Illuminate\Support\Facades\DB;
use App\Helpers\TextConditionHelpers;
use Livewire\WithPagination;

class SchoolYear extends Component
{

    public $year;
    public $is_active;
    public $dataId;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'resetForms'
    ];

    public function resetFields()
    {
        $this->year = null;
        $this->is_active = null;
    }

    public function resetForms()
    {
        $this->year = $this->is_active = null;
        $this->resetErrorBag();
    }

    public function save()
    {
        $this->validate([
            'year' => 'required|min:1',
            'is_active' => 'required'
        ]);
        DB::transaction(function () {
            $schools = SchoolYearModel::create([
                'year' => $this->year,
                'is_active' => $this->is_active,
            ]);

            SchoolYearModel::where('id', '!=', $schools->id)->where('is_active', $this->is_active)->update([
                'is_active' => 0
            ]);
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => TextConditionHelpers::GET_SAVED]
            );
            $this->dispatchBrowserEvent('hideModal');

            $this->resetFields();
        });
    }

    public function showEdit($dataId)
    {
        $check = SchoolYearModel::query()->find($dataId);
        $this->dataId = $check->id;
        $this->year = $check->year;
        $this->is_active = $check->is_active;
        $this->dispatchBrowserEvent('showModalEdit');
    }

    public function edit()
    {
        DB::transaction(function () {
            SchoolYearModel::find($this->dataId)->update([
                'year' => $this->year,
                'is_active' => $this->is_active,
            ]);
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => TextConditionHelpers::GET_UPDATED]
            );
            $this->dispatchBrowserEvent('hideModalEdit');
        });
    }

    public function showDelete($dataId)
    {
        $check = SchoolYearModel::query()->find($dataId);
        $this->dataId = $check->id;
        $this->year = $check->year;
        $this->dispatchBrowserEvent('showModalDelete');
    }
    public function delete()
    {
        DB::transaction(function () {
            SchoolYearModel::query()->find($this->dataId)->delete();
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => TextConditionHelpers::GET_DELETED]
            );
            $this->dispatchBrowserEvent('hideModalDelete');
        });
    }

    public function render()
    {
        return view('livewire.administrator.pages.school-year', [
            'schoolYears' => SchoolYearModel::orderByDesc('created_at')->paginate(10)
        ]);
    }
}
