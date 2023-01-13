<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\AdministratorModel;
use App\Models\CategoriesLessonModel;
use App\Models\GradeLevelModel;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        AdministratorModel::create([
            'name' => 'Administrator',
            'email' => 'administrator@learning.com',
            'password' => Hash::make('password')
        ]);

        $categoriesLesson = [
            [
                'name' => 'Web Development',
                'slug' => Str::slug('web-development'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bahasa Inggris',
                'slug' => Str::slug('bahasa-inggris'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];
        CategoriesLessonModel::insert($categoriesLesson);

        $gradeLevelSeeder = [
            [
                'grade' => 'X',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'grade' => 'XI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'grade' => 'XII',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'grade' => 'PKL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        GradeLevelModel::insert($gradeLevelSeeder);
    }
}
