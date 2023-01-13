<?php

namespace App\Http\Livewire\Administrator\Auth;

use Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function handleLogin()
    {
        $validatedDate = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->guard('administrator')->attempt(array('email' => $this->email, 'password' => $this->password))) {
            return redirect(route('administrator.dashboard'));
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Berhasil login dengan akun anda.']
            );
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'danger',  'message' => 'Gagal login dengan akun anda.']
            );
        }
    }
    public function render()
    {
        return view('livewire.administrator.auth.login');
    }
}
