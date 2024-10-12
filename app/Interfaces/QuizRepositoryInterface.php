<?php

namespace App\Interfaces;

interface QuizRepositoryInterface
{
    public function createQuiz(array $quizDetails);
    public function updateQuiz($quizId, array $newDetails);
    public function deleteQuiz($quizId);
    public function getAllQuizzes();
    public function getQuizById($quizId);
}
