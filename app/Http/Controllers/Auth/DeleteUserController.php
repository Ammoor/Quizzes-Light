<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Administrator;
use App\Models\Student;
use App\Models\Quiz;

class DeleteUserController extends Controller
{
    public function deleteCurrentAdmin()
    {
        $adminQuizzesIDs = array_column(json_decode(Auth::user()->quizzes), "quiz_id");
        Quiz::whereIn('id', $adminQuizzesIDs)->delete();
        Administrator::where('id', Auth::user()->id)->delete();
        return redirect('home')->with(['deleteMessage' => true]);
    }
    public function deleteCurrentStudent()
    {
        Student::where('id', Auth::user()->id)->delete();
        return redirect('home')->with(['deleteMessage' => true]);
    }
}
