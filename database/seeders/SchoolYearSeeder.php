<?php

namespace Database\Seeders;

use App\Models\SchoolYearModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SchoolYearModel::create([
            'year' => '2022/2023',
            'is_active' => 1
        ]);
    }
}
