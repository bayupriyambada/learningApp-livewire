<?php

namespace App\Http\Livewire\Administrator\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{

    public function handleLogout()
    {
        Auth::guard('administrator')->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect(route('administrator.login'));
    }
    public function render()
    {
        return view('livewire.administrator.auth.logout');
    }
}
