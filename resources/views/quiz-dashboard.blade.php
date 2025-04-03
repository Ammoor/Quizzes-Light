<x-admin-dashboard-layout>
    <x-slot:pageDescription>
        <meta name="description" content="" />
    </x-slot:pageDescription>
    <x-slot:title>
        Quiz details
    </x-slot:title>
    <x-slot:styleSheet>
        <link rel="stylesheet" href="{{ asset('CSS/quiz-dashboard.css') }}">
        @if (session('createMessage') || session('updateQuizNameMessage'))
            <style>
                main>h2 {
                    display: block;
                    animation-name: move-down;
                    animation-duration: 1s;
                }
            </style>
        @endif
    </x-slot:styleSheet>
    <x-slot:pageContent>
        @php
            $alertMessage = '';
            if (session('createMessage')) {
                $alertMessage = 'Your quiz has been created successfully!';
            } elseif (session('updateQuizNameMessage')) {
                $alertMessage = 'Your quiz name has been updated successfully!';
            }
        @endphp
        <h2>{{ $alertMessage }} <i class="fa-solid fa-check"></i></h2>
        <div class="quiz-details">
            <h2>Your quiz details</h2>
            {{-- Quiz ID --}}
            <div class="quiz-info">
                <h3>Quiz ID:</h3>
                <p>{{ $quizData->id }}</p>
            </div>
            {{-- Quiz Name --}}
            <div class="quiz-info">
                <h3>Quiz Name:</h3>
                <p>{{ $quizData->name }}</p>
            </div>
            {{-- Update Quiz Name Form --}}
            <div class="update-quiz-name-form">
                <form action="{{ route('update-quiz-name') }}" method="POST">
                    @csrf
                    <button type="button" onclick="expandEditView()">
                        <h2>Update quiz name <span><i class="fa-regular fa-pen-to-square"></i></span></h2>
                    </button>
                    <div class="edit-view not-active">
                        <div class="content">
                            <input type="text" name="new-quiz-name">
                            <input hidden type="text" name="quizID" value="{{ $quizData->id }}">
                            <div class="form-buttons">
                                <button>Update</button>
                                <button type="button" onclick="expandEditView()">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- Add Questions button --}}
        <div class="add-questions-page-link">
            <a href="{{ url("add-questions/{$quizData->id}") }}">Add Questions <i
                    class="fa-solid fa-circle-plus"></i></a>
        </div>
        {{-- Delete Quiz Form --}}
        <div class="delete-quiz-form">
            <form action="{{ route('delete-quiz') }}" method="POST">
                @csrf
                <h2>Danger zone <span><i class="fa-solid fa-triangle-exclamation"></i></span></h2>
                <div class="danger-zone">
                    <h2>Delete the quiz</h2>
                    <span>Quick reminder</span>
                    <div class="inform-message">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <p>Deleting this quiz will permanently remove all questions, answers, and any results associated
                            with it. This action cannot be undone, and the quiz will no longer be accessible to any
                            users.
                        </p>
                    </div>
                    <input hidden type="text" name="quizID" value="{{ $quizData->id }}">
                    <button type="button" onclick="deleteQuiz()">Delete</button>
                </div>
            </form>
        </div>
    </x-slot:pageContent>
    <x-slot:javaScript>
        <script src="{{ asset('JavaScript/quiz-dashboard.js') }}"></script>
    </x-slot:javaScript>
</x-admin-dashboard-layout>
