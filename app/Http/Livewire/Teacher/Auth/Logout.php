<?php

namespace App\Http\Livewire\Teacher\Auth;

use Livewire\Component;

class Logout extends Component
{
    public function handleLogout()
    {
        auth()->guard('teacher')->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect(route('teacher.login'));
    }
    public function render()
    {
        return view('livewire.teacher.auth.logout');
    }
}
