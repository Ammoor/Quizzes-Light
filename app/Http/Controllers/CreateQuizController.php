<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CreateQuizController extends Controller
{
    public function createQuiz(Request $request)
    {
        $request->validate([
            "quiz-name" => 'required',
        ]);
        $newQuiz = Quiz::create([
            'name' => $request->input("quiz-name"),
            // Default Values.
            'time' => -1,
            'time_slot' => -1,
            'questions' => json_encode([]),
            'answers' => json_encode([]),
            'grades' => json_encode([]),
        ]);
        // Add the new quiz to admin's record.
        $adminRecord = Administrator::where('id', Auth::user()->id)->first();
        $adminQuizzes = json_decode($adminRecord->quizzes);
        $adminQuizzes[] = ['quiz_id' => $newQuiz->id];
        $adminRecord->update(['quizzes' => json_encode($adminQuizzes)]);
        return redirect("quiz-dashboard/{$newQuiz->id}")->with(['createMessage' => true]);
    }
    /*
    public function store(Request $request)
    {
        // Validate the quiz data.
        $request->validate([
            'specialization' => 'required',
            'questions-number' => 'required',
            'quiz-time' => 'required',
            'time-slot' => 'required'
        ]);
        $questions = null;
        $answers = null;
        // Make a new quiz record.
        $quizData = Quiz::create([
            'name' => 'Quiz ' . Quiz::count() + 1,
            'specialization_id' => Specialization::where('name', $request->input('specialization'))->first()->id,
            'time' => $request->input('quiz-time'),
            'time_slot' => $request->input('time-slot'),
            'questions' => json_encode($questions),
            'answers' => json_encode($answers),
            'grades' => json_encode([]),
        ]);
        // Add the new quiz to admin's record.
        $adminData = Administrator::where('id', Auth::user()->id)->first();
        $adminQuizzes = json_decode($adminData->quizzes);
        $adminQuizzes[] = ['quiz_id' => $quizData->id];
        $adminData->update(['quizzes' => json_encode($adminQuizzes)]);
        // Add the new quiz to all students' records.
        $studentsRecords = Student::all();
        foreach ($studentsRecords as $studentRecord) {
            $studentRecord->update(['quizzes' => json_encode($adminQuizzes)]);
        }
        return redirect("quiz-generated/$quizData->id")->with(['createMessage' => true]);
    }
    */
}
