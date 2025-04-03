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
        for ($i = 1; $i <= 10; $i++) { // Create 10 questions per quiz.
            $questions[] = [
                'id' => $i,
                'question_text' => $this->faker->sentence,
            ];
            $answers[] = [
                'question_id' => $i,
                'answer_text' => 'The right answer',
            ];
            $grades[] = [
                'id' => $i,
                'student_id' => $this->faker->numberBetween(1, 100),
                'grade' => $this->faker->numberBetween(0, 20),
            ];
        }
        return [
            'name' => 'Quiz ' . $this->faker->unique()->numberBetween(50, 100),
            'time' => $this->faker->numberBetween(5, 20), // Duration in minutes
            'time_slot' => $this->faker->numberBetween(5, 60), // Duration in minutes
            'questions' => json_encode($questions),
            'answers' => json_encode($answers),
            'grades' => json_encode($grades),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
