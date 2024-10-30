<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class DeleteQuizController extends Controller
{
    public function delete(Request $request)
    {
        Quiz::where('id', $request->quizID)->first()->delete();
        return redirect(route('admin-dashboard-home'))->with(['deleteMessage' => true]);
    }
}
