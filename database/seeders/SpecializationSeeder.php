<?php

namespace Database\Seeders;

use App\Models\Specialization;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specializations = [
            'HTML',
            'CSS',
            'JavaScript',
            'MySQL',
            'PHP',
            'Laravel',
            'WordPress',
        ];
        foreach ($specializations as $specialization) {
            Specialization::create([
                'name' => $specialization,
            ]);
        }
    }
}
