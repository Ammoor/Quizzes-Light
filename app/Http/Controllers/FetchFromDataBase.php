<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Quiz;
use App\Models\Specialization;
use Faker\Factory as Faker;

class FetchFromDataBase extends Controller
{
    public function specializationData()
    {
        $specializationData = Specialization::all();
        return view('generate-quiz', compact('specializationData'));
    }
    public function adminQuizzesData()
    {
        $adminQuizzes = json_decode(Auth::user()->quizzes);
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
    public function studentQuizzesData()
    {
        $studentQuizzes = json_decode(Auth::user()->quizzes);
        $quizzesData = [];
        foreach ($studentQuizzes as $studentQuiz) {
            $studentGrade = null;
            $studentQuiz = Quiz::where('id', $studentQuiz->quiz_id)->first();
            foreach (json_decode($studentQuiz->grades) as $grade) {
                if ($grade->student_id == Auth::user()->id) {
                    $studentGrade = $grade->grade;
                    break;
                }
            }
            $quizzesData[] =
                [
                    'quizID' => $studentQuiz->id,
                    'quizSpecialization' => Specialization::where('id', $studentQuiz->specialization_id)->first()->name,
                    'quizNumberQuestions' => count(json_decode($studentQuiz->questions)),
                    'quizTime' => $studentQuiz->time,
                    'quizTimeSlot' => $studentQuiz->time_slot,
                    'studentGrade' => $studentGrade,
                ];
        }
        return view('student-tests', compact('quizzesData'));
    }
    public function quizQuestions()
    {
        $studentQuizzes = json_decode(Auth::user()->quizzes);
        $quizQuestions = json_decode(Quiz::where('id', $studentQuizzes[0]->quiz_id)->first()->questions);
        $quizQuestionsAnswers = json_decode(Quiz::where('id', $studentQuizzes[0]->quiz_id)->first()->answers);
        $questionsData = [];
        // Assign quiz ID.
        $questionsData['quizID'] =  $studentQuizzes[0]->quiz_id;
        // Assign questions.
        foreach ($quizQuestions as $quizQuestion) {
            $questionsData['questions'][] = $quizQuestion->question_text;
        }
        // Assign questions answers.
        foreach ($quizQuestionsAnswers as $index => $quizQuestionAnswers) {
            $answersArray = [];
            for ($i = 1; $i <= 4; $i++) {
                array_push($answersArray, Faker::create()->sentence);
            }
            $questionsData['answers'][] = $answersArray;
            $questionsData['answers'][$index][rand(0, 3)] = $quizQuestionAnswers->answer_text;
        }
        return view('test-page', compact('questionsData'));
    }
}
