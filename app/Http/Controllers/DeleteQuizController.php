<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Student;
use App\Models\Administrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteQuizController extends Controller
{
    public function delete(Request $request)
    {
        // Delete quiz from quizzes table.
        Quiz::where('id', $request->quizID)->first()->delete();
        // Delete quiz from admin quizzes.
        $adminData = Administrator::where('id', Auth::user()->id)->first();
        $adminQuizzes = json_decode($adminData->quizzes);
        for ($i = 0; $i < count($adminQuizzes); $i++) {
            if ($adminQuizzes[$i]->quiz_id == $request->quizID) {
                unset($adminQuizzes[$i]);
                break;
            }
        }
        $adminData->update(['quizzes' => $adminQuizzes]);
        // Delete quiz from students records.
        $studentsRecords = Student::all();
        foreach ($studentsRecords as $studentRecord) {
            $studentQuizzes  = json_decode($studentRecord->quizzes);
            for ($i = 0; $i < count($studentQuizzes); $i++) {
                if ($studentQuizzes[$i]->quiz_id == $request->quizID) {
                    unset($studentQuizzes[$i]);
                    break;
                }
            }
            $studentRecord->update(['quizzes' => $studentQuizzes]);
        }
        return redirect(route('admin-dashboard-home'))->with(['deleteMessage' => true]);
    }
}
