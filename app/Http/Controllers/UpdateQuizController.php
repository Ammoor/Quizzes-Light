<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class UpdateQuizController extends Controller
{
    public function updateName(Request $request)
    {
        $request->validate([
            "new-quiz-name" => 'required',
        ]);
        Quiz::where('id', $request->quizID)->first()->update(["name" => $request->input("new-quiz-name")]);
        return redirect("quiz-dashboard/{$request->quizID}")->with(['updateQuizNameMessage' => true]);
    }
}
