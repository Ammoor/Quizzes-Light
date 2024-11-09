<x-admin-dashboard-layout>
    <x-slot:pageDescription>
        <meta name="description" content="" />
    </x-slot:pageDescription>
    <x-slot:title>
        My Quizzes
    </x-slot:title>
    <x-slot:styleSheet>
        <link rel="stylesheet" href="{{ asset('CSS/admin-tests.css') }}">
    </x-slot:styleSheet>
    <x-slot:pageContent>
        <h2>My Quizzes</h2>
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
                    {{-- Quiz Number Of Questions --}}
                    <div class="quiz-info">
                        <h3>Number of questions:</h3>
                        <p>{{ $quizData['quizNumberQuestions'] }}</p>
                    </div>
                    {{-- Quiz Time --}}
                    <div class="quiz-info">
                        <h3>Quiz time:</h3>
                        <p>{{ $quizData['quizTime'] }} minutes</p>
                    </div>
                    <div class="quiz-buttons">
                        <a href="{{ route('quiz-generated', ['quizID' => $quizData['quizID']]) }}">Update</a>
                        <a href="{{ route('quiz-generated', ['quizID' => $quizData['quizID']]) }}">Delete</a>
                        <a href="{{ route('students-statistics', ['quizID' => $quizData['quizID']]) }}">Students
                            Statistics</a>
                    </div>
                </div>
            @endforeach
        @else
            <div class="no-quizzes-card">
                <h2>Oops! You haven't created any quizzes yet! <span><i class="fa-solid fa-face-frown"></i></span></h2>
                <a href="generate-quiz">Create your first quiz now! <span><i
                            class="fa-solid fa-arrow-up-right-from-square"></i></span></a>
            </div>
        @endif
    </x-slot:pageContent>
    <x-slot:javaScript>
        <script src="{{ asset('JavaScript/admin-tests.js') }}"></script>
    </x-slot:javaScript>
</x-admin-dashboard-layout>
