<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\TeacherModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TeacherModel::create([
            'name' => 'teacher1',
            'email' => 'teacher1@learning.com',
            'password' => Hash::make('password'),
            'nik' => '20.001'
        ]);
    }
}
