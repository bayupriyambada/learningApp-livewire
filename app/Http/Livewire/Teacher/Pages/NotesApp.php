<?php

namespace App\Http\Livewire\Teacher\Pages;

use Livewire\Component;
use App\Models\NotesAppModel;
use Illuminate\Support\Facades\DB;
use App\Helpers\TextConditionHelpers;

class NotesApp extends Component
{
    public $dataId;
    public $name;
    public $description;
    public $statusNotes = "TODO";
    public $teacherId;

    protected $listeners = [
        'resetForms'
    ];

    // public function updatingSearch()
    // {
    //     $this->resetPage();
    // }

    // public function mount()
    // {
    //     $this->resetPage();
    // }

    public function resetFields()
    {
        $this->name = null;
        $this->description = null;
    }

    public function resetForms()
    {
        $this->name = $this->description = null;
        $this->resetErrorBag();
    }

    public function create()
    {
        $this->validate([
            'name' => 'required|min:1',
            'description' => 'nullable|string|max:10000'
        ], [
            'name.required' => 'Nama Catatan tidak boleh kosong',
            'name.max' => 'Deskripsi Catatan maksimal 10.000 karakter',
        ]);

        DB::transaction(function () {
            NotesAppModel::create([
                'name' => $this->name,
                'description' => $this->description,
                'teacher_id' => auth()->guard('teacher')->user()->id,
                'status' => $this->statusNotes
            ]);
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => TextConditionHelpers::GET_SAVED]
            );
            $this->dispatchBrowserEvent('hideModal');
            $this->resetFields();
        });
    }

    public function nextProgress($dataId)
    {
        $check = NotesAppModel::query()->isTodo()->userById(auth()->guard('teacher')->user()->id)->find($dataId);
        $check->update([
            'status' => 'INPROGRESS'
        ]);
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => $check->name . ' berhasil ke sedang berlangsung!']
        );
    }
    public function previosTodo($dataId)
    {
        $check = NotesAppModel::query()->isProgress()->userById(auth()->guard('teacher')->user()->id)->find($dataId);
        $check->update([
            'status' => 'TODO'
        ]);
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => $check->name . ' berhasil di pindahkan ke catatan awal']
        );
    }
    public function nextCompleted($dataId)
    {
        $check = NotesAppModel::query()->isProgress()->userById(auth()->guard('teacher')->user()->id)->find($dataId);
        $check->update([
            'status' => 'COMPLETED'
        ]);
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => $check->name . ' berhasil selesai! Horee 🙌']
        );
    }
    public function previosProgress($dataId)
    {
        $check = NotesAppModel::query()->isCompleted()->userById(auth()->guard('teacher')->user()->id)->find($dataId);
        $check->update([
            'status' => 'INPROGRESS'
        ]);
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => $check->name . ' Dikembalikan ke progress']
        );
    }

    public function showEdit($dataId)
    {
        $check = NotesAppModel::query()->isTodo()->userById(auth()->guard('teacher')->user()->id)->find($dataId);
        $this->dataId = $check->id;
        $this->name = $check->name;
        $this->description = $check->description;
        $this->dispatchBrowserEvent('showModalEdit');
    }
    public function edit()
    {
        DB::transaction(function () {
            NotesAppModel::find($this->dataId)->update([
                'name' => $this->name,
                'description' => $this->description,
                'teacher_id' => auth()->guard('teacher')->user()->id
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
        $check = NotesAppModel::query()->isTodo()->userById(auth()->guard('teacher')->user()->id)->find($dataId);
        $this->dataId = $check->id;
        $this->name = $check->name;
        $this->description = $check->description;
        $this->dispatchBrowserEvent('showModalDelete');
    }
    public function delete()
    {
        DB::transaction(function () {
            $dd = NotesAppModel::query()->isTodo()->userById(auth()->guard('teacher')->user()->id)->find($this->dataId)->delete();
            // dd($dd);
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => TextConditionHelpers::GET_DELETED]
            );
            $this->dispatchBrowserEvent('hideModalDelete');
        });
    }

    public function render()
    {
        // todos
        $todos = NotesAppModel::query()->isTodo()->orderByDesc('created_at')->userById(auth()->guard('teacher')->user()->id)->get();
        $todoCount = NotesAppModel::query()->isTodo()->userById(auth()->guard('teacher')->user()->id)->count();
        // progress
        $todosProgress = NotesAppModel::query()->isProgress()->orderByDesc('created_at')->userById(auth()->guard('teacher')->user()->id)->get();
        $todoProgressCount = NotesAppModel::query()->isProgress()->userById(auth()->guard('teacher')->user()->id)->count();
        // completed
        $todosCompleted = NotesAppModel::query()->isCompleted()->orderByDesc('created_at')->userById(auth()->guard('teacher')->user()->id)->get();
        $todoCompletedCount = NotesAppModel::query()->isCompleted()->userById(auth()->guard('teacher')->user()->id)->count();
        return view('livewire.teacher.pages.notes-app', [
            'todos' => $todos,
            'todoCount' => $todoCount,
            'todosProgress' => $todosProgress,
            'todoProgressCount' => $todoProgressCount,
            'todosCompleted' => $todosCompleted,
            'todoCompletedCount' => $todoCompletedCount,
        ]);
    }
}
