<?php

namespace App\Http\Livewire\Administrator\Pages;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Helpers\TextConditionHelpers;
use App\Models\CategoriesLessonModel;

class CategoriesLesson extends Component
{
    public $name;
    public $slug;
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
        $this->name = null;
        $this->slug = null;
    }

    public function resetForms()
    {
        $this->name = $this->slug = null;
        $this->resetErrorBag();
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|min:1',
        ]);

        DB::transaction(function () {
            CategoriesLessonModel::create([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
            ]);
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => TextConditionHelpers::GET_SAVED]
            );
            $this->dispatchBrowserEvent('hideModal');
            $this->resetFields();
        });
    }
    public function showEdit($categories)
    {
        $this->dataId = $categories['id'];
        $this->name = $categories['name'];
        $this->dispatchBrowserEvent('showModalEdit');
    }
    public function edit()
    {
        DB::transaction(function () {
            CategoriesLessonModel::find($this->dataId)->update([
                'name' => $this->name,
                'slug' => Str::slug($this->name),
            ]);
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => TextConditionHelpers::GET_UPDATED]
            );
            $this->dispatchBrowserEvent('hideModalEdit');
        });
    }

    public function showDelete($categories)
    {
        $this->dataId = $categories['id'];
        $this->name = $categories['name'];
        $this->dispatchBrowserEvent('showModalDelete');
    }
    public function delete()
    {
        DB::transaction(function () {
            CategoriesLessonModel::find($this->dataId)->delete();
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => TextConditionHelpers::GET_DELETED]
            );
            $this->dispatchBrowserEvent('hideModalDelete');
        });
    }
    public function render()
    {
        return view(
            'livewire.administrator.pages.categories-lesson',
            [
                'categoriesLesson' => CategoriesLessonModel::orderByDesc('created_at')
                    ->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('slug', 'like', '%' . $this->search . '%')
                    ->paginate(8)
            ]
        );
    }
}
