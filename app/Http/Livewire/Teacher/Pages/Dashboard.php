<?php

namespace App\Http\Livewire\Teacher\Pages;

use App\Helpers\TextConditionHelpers;
use Carbon\Carbon;
use Livewire\Component;

class Dashboard extends Component
{
    public $says;

    public function render()
    {
        $this->says = date('G');
        $userId = auth()->guard('teacher')->user()->name;
        if ($this->says >= 5 && $this->says <= 11) {
            $this->says = TextConditionHelpers::TIME_MORNING . ' ' . $userId;
        } else if ($this->says >= 12 && $this->says <= 15) {
            $this->says = TextConditionHelpers::TIME_AFTERNOON . ' ' . $userId;
        } else {
            $this->says = TextConditionHelpers::TIME_EVENING . ' ' . $userId;
        }
        return view('livewire.teacher.pages.dashboard');
    }
}
