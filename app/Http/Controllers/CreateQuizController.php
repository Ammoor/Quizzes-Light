<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use App\Models\Administrator;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;
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
            'time-slot' => 'required'
        ]);

        for ($i = 1; $i <= $request->input('questions-number'); $i++) {
            $questions[] = [
                'id' => $i,
                'question_text' => Faker::create()->sentence,
            ];
            $answers[] = [
                'question_id' => $i,
                'answer_text' => 'The right answer',
            ];
        }

        $quizData = Quiz::create([
            'name' => 'Quiz ' . Quiz::count() + 1,
            'specialization_id' => Specialization::where('name', $request->input('specialization'))->first()->id,
            'time' => $request->input('quiz-time'),
            'questions' => json_encode($questions),
            'answers' => json_encode($answers),
            'grades' => json_encode([]),
        ]);

        $adminData = Administrator::where('id', Auth::user()->id)->first();
        $adminQuizzes = json_decode($adminData->quizzes);
        $adminQuizzes[] = ['quiz_id' => $quizData->id];

        $adminData->update(['quizzes' => json_encode($adminQuizzes)]);

        $quizTimeSlot = $request['time-slot'];

        return redirect("quiz-generated/$quizData->id/$quizTimeSlot")->with(['createMessage' => true]);
    }
}
