<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Administrator;
use App\Models\Quiz;
use App\Models\Specialization;

class FetchFromDataBase extends Controller
{
    public function specializationData()
    {
        $specializationData = Specialization::all();
        return view('generate-quiz', compact('specializationData'));
    }
    public function adminQuizzesData()
    {
        $adminQuizzes = json_decode(Administrator::where('id', Auth::user()->id)->first()->quizzes);
        $quizzesData = [];
        foreach ($adminQuizzes as $adminQuiz) {
            $adminQuiz = Quiz::where('id', $adminQuiz->quiz_id)->first();
            $quizzesData[] =
                [
                    'quizID' => $adminQuiz->id,
                    'quizSpecialization' => Specialization::where('id', $adminQuiz->specialization_id)->first()->name,
                    'quizNumberQuestions' => count(json_decode($adminQuiz->questions)),
                    'quizTime' => $adminQuiz->time,
                ];
        }
        return view('admin-tests', compact('quizzesData'));
    }
}
