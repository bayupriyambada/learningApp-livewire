<?php

namespace App\Http\Livewire\Teacher\Auth;

use App\Http\Livewire\Administrator\Pages\Teacher;
use App\Models\TeacherModel;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function handleLogin()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        $credentials = array('email' => $this->email, 'password' => $this->password);
        if (auth()->guard('teacher')->attempt($credentials)) {
            $checkActive = TeacherModel::where('email', $this->email)->first();
            if ($checkActive->is_active == 0) {
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'error',  'message' => 'Akun anda belum di aktifkan, hubungin administrator untuk diaktifkan.']
                );
            } else {
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'success',  'message' => 'Berhasil login dengan akun anda.']
                );
                return redirect(route('teacher.dashboard'));
            }
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => 'Email atau password yang anda masukkan tidak sesuai.']
            );
        }
        // dd($credentials);
        //     if (auth()->guard('teacher')->attempt(array('email' => $this->email, 'password' => $this->password, 'is_active' => 1))) {
        //         if (auth()->guard('teacher')->is_active) {
        //             $this->dispatchBrowserEvent(
        //                 'alert',
        //                 ['type' => 'success',  'message' => 'Berhasil login dengan akun anda.']
        //             );
        //         } else {
        //             $this->dispatchBrowserEvent(
        //                 'alert',
        //                 ['type' => 'success',  'message' => 'Akun anda belum aktif.']
        //             );
        //         }
        //         return redirect(route('teacher.dashboard'));
        //     } else {
        //         $this->dispatchBrowserEvent(
        //             'alert',
        //             ['type' => 'error',  'message' => 'Data yang dimasukkan tidak sesuai.']
        //         );
        //     }
    }
    public function render()
    {
        return view('livewire.teacher.auth.login');
    }
}
