<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckQuizAnswersController extends Controller
{
    public function checkQuizAnswers(Request $request)
    {
        $rightAnswers = 0;
        $quizData = Quiz::where('id', $request->quizID)->first();
        $quizAnswers = json_decode($quizData->answers);
        $quizGrades = json_decode($quizData->grades);
        for ($i = 0; $i < count($request->all()) - 2; $i++) { // We subtracted 2 from the loop to exclude the "_token" and "quizID".
            if ($request["question-$i"] == $quizAnswers[$i]->answer_text) {
                $rightAnswers++;
            }
        }
        $quizGrades[] =
            [
                'id' => count($quizGrades) + 1,
                'student_id' => Auth::user()->id,
                'grade' => $rightAnswers,
            ];
        $quizData->update(['grades' => json_encode($quizGrades)]);
        return  redirect('student-tests')->with(['grade_confirmation' => true]);
    }
}
