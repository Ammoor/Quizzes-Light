<x-student-dashboard-layout>
    <x-slot:pageDescription>
        <meta name="description" content="" />
    </x-slot:pageDescription>
    <x-slot:title>
        My tests
    </x-slot:title>
    <x-slot:styleSheet>
        <link rel="stylesheet" href="{{ asset('CSS/student-tests.css') }}">
        @if (session('grade_confirmation'))
            <style>
                main .grade-msg {
                    display: block;
                    animation-name: move-down;
                    animation-duration: 1s;
                }
            </style>
        @endif
    </x-slot:styleSheet>
    <x-slot:pageContent>
        @if (session('grade_confirmation'))
            @php
                $quizNumberQuestions = $quizzesData[0]['quizNumberQuestions'];
                $studentGrade = $quizzesData[0]['studentGrade'];
                $studentGradePercentage = ($studentGrade / $quizNumberQuestions) * 100;
                $gradeConfirmationMessage = null;
                if ($studentGradePercentage >= 90) {
                    $gradeConfirmationMessage = "Outstanding work! You’ve achieved a perfect score of $studentGrade / $quizNumberQuestions. Your dedication truly shines!";
                } elseif ($studentGradePercentage >= 80) {
                    $gradeConfirmationMessage = "Great job! You scored very well with a score of $studentGrade / $quizNumberQuestions. Keep up the excellent effort!";
                } elseif ($studentGradePercentage >= 70) {
                    $gradeConfirmationMessage = "Nice work! You scored a $studentGrade / $quizNumberQuestions, a solid grade. There’s still room for improvement, but you’re on the right path.";
                } elseif ($studentGradePercentage >= 50) {
                    $gradeConfirmationMessage = "You passed with an acceptable score of $studentGrade / $quizNumberQuestions. Consider reviewing some areas to strengthen your understanding.";
                } else {
                    $gradeConfirmationMessage = "You scored $studentGrade / $quizNumberQuestions, which unfortunately is below passing. Don’t be discouraged! Review the material, and you’ll come back stronger.";
                }
            @endphp
            <div class="grade-msg">
                <h2>{{ $gradeConfirmationMessage }} <span><i class="fa-solid fa-graduation-cap"></i></span></h2>
            </div>
        @endif
        <h2>My tests</h2>
        @if (count($quizzesData))
            @foreach ($quizzesData as $cnt => $quizData)
                <div class="quiz-details">
                    <h2>Your quiz {{ $cnt + 1 }} details</h2>
                    {{-- Quiz ID --}}
                    <div class="quiz-info">
                        <h3>Quiz ID:</h3>
                        <p>{{ $quizData['quizID'] }}</p>
                    </div>
                    {{-- Quiz Specialization --}}
                    <div class="quiz-info">
                        <h3>Quiz specialization:</h3>
                        <p>{{ $quizData['quizSpecialization'] }}</p>
                    </div>
                    {{-- Quiz Time --}}
                    <div class="quiz-info">
                        <h3>Quiz time:</h3>
                        <p>{{ $quizData['quizTime'] }} minutes</p>
                    </div>
                    {{-- Quiz Time Slot --}}
                    <div class="quiz-info">
                        <h3>Quiz will start after:</h3>
                        <p>{{ $quizData['quizTimeSlot'] }} minutes</p>
                    </div>
                    @if ($quizData['studentGrade'] !== null)
                        {{--  Student Grade --}}
                        <div class="quiz-info">
                            <h3>Quiz grade:</h3>
                            <p>{{ $quizData['studentGrade'] . ' \ ' . $quizData['quizNumberQuestions'] }}</p>
                        </div>
                    @endif
                </div>
            @endforeach
        @else
            <div class="no-quizzes-card">
                <h2>No quizzes available at the moment. The admin is likely preparing something great, so check back
                    soon! <span><i class="fa-solid fa-graduation-cap"></i></span></h2>
            </div>
        @endif
    </x-slot:pageContent>
    <x-slot:javaScript>
        <script></script>
    </x-slot:javaScript>
</x-student-dashboard-layout>
