<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:1',
            'email' => 'required|min:1|unique:teacher,email',
            'nik' => 'required|min:1|unique:teacher,nik',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama lengkap harus diisikan.',
            'email.required' => 'Email harus diisikan.',
            'email.unique' => 'Email sudah digunakan.',
            'nik.unique' => 'Nik sudah digunakan.',
            'nik.required' => 'Nik harus diisikan.',
        ];
    }
}
