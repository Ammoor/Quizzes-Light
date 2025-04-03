<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Administrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteQuizController extends Controller
{
    public function delete(Request $request)
    {
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
        return redirect(route('admin-dashboard-home'))->with(['deleteMessage' => true]);
    }
}
