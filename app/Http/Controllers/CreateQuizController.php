<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class CreateQuizController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'specialization' => 'required',
            'questions-number' => 'required',
            'quiz-time' => 'required',
        ]);

        $specializationID = Specialization::where('name', $request->input('specialization'))->first()->id;
        $questions = [];
        $answers = [];

        for ($i = 1; $i <= $request->input('questions-number'); $i++) {
            $questions[] = [
                'id' => $i,
                'question_text' => Faker::create()->sentence,
            ];
            $answers[] = [
                'question_id' => $i,
                'answer_text' => Faker::create()->sentence,
            ];
        }

        $quiz = Quiz::create([
            'name' => 'Quiz ' . Quiz::count() + 1,
            'specialization_id' => $specializationID,
            'time' => $request->input('quiz-time'),
            'questions' => json_encode([$questions]),
            'answers' => json_encode([$answers]),
            'grades' => json_encode([]),
        ]);
    }
}
