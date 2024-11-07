<x-student-dashboard-layout>
    <x-slot:pageDescription>
        <meta name="description" content="" />
    </x-slot:pageDescription>
    <x-slot:title>
        My tests
    </x-slot:title>
    <x-slot:styleSheet>
        <link rel="stylesheet" href="{{ asset('CSS/student-tests.css') }}">
        @if (session('quizIdGradeConfirmation'))
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
        @foreach ($quizzesData as $quizData)
            @if (session('quizIdGradeConfirmation') == $quizData['quizID'])
                @php
                    $quizNumberQuestions = $quizData['quizNumberQuestions'];
                    $studentGrade = $quizData['studentGrade'];
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
            @break
        @endif
    @endforeach
    <h2>My tests</h2>
    @if (count($quizzesData))
        @foreach ($quizzesData as $index => $quizData)
            <div class="quiz-details">
                <h2>Your quiz {{ $index + 1 }} details</h2>
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
                    {{-- Handled By JS --}}
                    <p id="time-slot"></p>
                </div>
                @if ($quizData['studentGrade'] !== null)
                    {{--  Student Grade --}}
                    <div class="quiz-info">
                        <h3>Quiz grade:</h3>
                        <p>{{ $quizData['studentGrade'] . ' \ ' . $quizData['quizNumberQuestions'] }}</p>
                    </div>
                @endif
                <div class="start-quiz-button">
                    <a href="{{ route('test-page', ['quizID' => $quizData['quizID']]) }}">Start your quiz!</a>
                </div>
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
    <script>
        const quizzesData = @json($quizzesData);
        const quizzesTimeSlots = document.querySelectorAll('#time-slot');
        const quizButton = document.querySelectorAll('main .quiz-details .start-quiz-button');

        function clcLeftTime(time) {
            const minutes = Math.floor(time / 60);
            const seconds = time % 60;
            return `${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds} minutes`;
        }

        quizzesTimeSlots.forEach((quizTimeSlot, index) => {
            let intervalId = null;
            const quizGeneratedTime = quizzesData[index]['quizGeneratedTime'];

            if (!localStorage.getItem(`quiz-${index}`) && !localStorage.getItem(`quiz-${index}-start`)) {
                localStorage.setItem(`quiz-${index}`, quizGeneratedTime + quizzesData[index]['quizTimeSlot'] * 60);
            }

            if (localStorage.getItem(`quiz-${index}-start`)) {
                quizTimeSlot.innerHTML = "Quiz is running!";
                quizTimeSlot.classList.add('quiz-running');
                quizButton[index].classList.add('active');
            } else {
                quizTimeSlot.innerHTML = clcLeftTime(localStorage.getItem(`quiz-${index}`) - quizGeneratedTime);
            }

            if (quizzesData[index]['studentGrade'] !== null) {
                quizButton[index].classList.remove('active');
                quizTimeSlot.innerHTML = "Quiz finished. Thank you!";
            }

            function decreaseQuizTime() {
                let leftTime = localStorage.getItem(`quiz-${index}`) - 1;
                if (leftTime == quizGeneratedTime) {
                    localStorage.setItem(`quiz-${index}-start`, true);
                    localStorage.removeItem(`quiz-${index}`);
                    quizTimeSlot.innerHTML = "Quiz is running!";
                    quizTimeSlot.classList.add('quiz-running');
                    quizButton[index].classList.add('active');
                    clearInterval(intervalId);
                    alert(`Your quiz ${index+1} has begun! Time to showcase your knowledge – good luck!`);
                } else {
                    localStorage.setItem(`quiz-${index}`, leftTime);
                    quizTimeSlot.innerHTML = clcLeftTime(leftTime - quizGeneratedTime);
                }
            }

            if (!localStorage.getItem(`quiz-${index}-start`)) {
                intervalId = setInterval(decreaseQuizTime, 1000);
            }
        });
    </script>
</x-slot:javaScript>
</x-student-dashboard-layout>
