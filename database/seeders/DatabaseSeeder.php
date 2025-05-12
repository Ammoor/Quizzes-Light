<?php

namespace Database\Seeders;

use App\Models\Administrator;
use App\Models\Student;
use App\Models\Quiz;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Student::factory(10)->create();
        Administrator::factory(10)->create();
        Quiz::factory(10)->create();
    }
}
