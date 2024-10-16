<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Quiz' . $this->faker->unique()->numberBetween(1, 100),
            'specializations_id' => $this->faker->numberBetween(1, 7), // 7 specializations
            'time' => $this->faker->numberBetween(5, 20), // Duration in minutes
            'question' => json_encode([
                'id' => $this->faker->unique()->numberBetween(1, 100),
                'question_text' => $this->faker->sentence,
            ]),
            'grades' => json_encode([
                'id' => $this->faker->unique()->numberBetween(1, 100),
                'quiz_id' => $this->faker->numberBetween(1, 100),
                'student_id' => $this->faker->numberBetween(1, 100),
                'grade' => $this->faker->numberBetween(1, 100),
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
