<?php

namespace App\Repositories;

use App\Models\Quiz;

class QuizRepository
{
    public function createQuiz(array $quizDetails)
    {
        return Quiz::create($quizDetails);
    }

    public function updateQuiz($quizId, array $newDetails)
    {
        return Quiz::whereId($quizId)->update($newDetails);
    }

    public function deleteQuiz($quizId)
    {
        return Quiz::destroy($quizId);
    }
    public function getAllQuizzes()
    {
        return Quiz::all();
    }

    public function getQuizById($quizId)
    {
        return Quiz::findOrFail($quizId);
    }
}
