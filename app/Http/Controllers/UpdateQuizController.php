<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class UpdateQuizController extends Controller
{
    public function update(Request $request)
    {
        $quizRecord = Quiz::where('id', $request->quizID)->first();
        # Specialization
        if ($request->specialization) {
            $quizRecord->update(['specialization_id' => Specialization::where('name', $request->specialization)->first()->id]);
        }
        # Number Of Questions
        if ($request['questions-number']) {
            for ($i = 1; $i <= $request['questions-number']; $i++) {
                $questions[] = [
                    'id' => $i,
                    'question_text' => Faker::create()->sentence,
                ];
                $answers[] = [
                    'question_id' => $i,
                    'answer_text' => 'The right answer',
                ];
            }
            $quizRecord->update(['questions' => json_encode($questions), 'answers' => json_encode($answers)]);
        }
        # Time
        if ($request['quiz-time']) {
            $quizRecord->update(['time' => $request['quiz-time']]);
        }
        # Time Slot
        if ($request['time-slot']) {
            $request['quizTimeSlot'] = $request['time-slot'];
        }
        return redirect("quiz-generated/$request->quizID")->with(['updateMessage' => true]);
    }
}
