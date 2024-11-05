<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Specialization;

class ViewGeneratedQuizController extends Controller
{
    public function view($quizID)
    {
        $specializations = Specialization::all();
        $quizData = Quiz::where('id', $quizID)->first();
        $quizData['specialization_name'] = Specialization::where('id', $quizData->specialization_id)->first()->name;
        $quizData['time_slot'] = Quiz::where('id', $quizID)->first()->time_slot;
        $quizData['questions_number'] = count(json_decode($quizData['questions']));
        return view('quiz-generated', compact('quizData', 'specializations'));
    }
}
