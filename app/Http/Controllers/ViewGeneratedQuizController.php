<?php

namespace App\Http\Controllers;

use App\Models\Quiz;

class ViewGeneratedQuizController extends Controller
{
    public function viewQuizDashboard($quizID)
    {
        $quizData = Quiz::where('id', $quizID)->first();
        return view('quiz-dashboard', compact('quizData'));
    }
    public function viewAddQuestionsDashboard($quizID)
    {
        return view('add-questions', compact('quizID'));
    }
}
