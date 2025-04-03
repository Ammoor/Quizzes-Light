<x-admin-dashboard-layout>
    <x-slot:pageDescription>
        <meta name="description" content="" />
    </x-slot:pageDescription>
    <x-slot:title>
        Create Test Dashboard
    </x-slot:title>
    <x-slot:styleSheet>
        <link rel="stylesheet" href="{{ asset('CSS/generate-quiz.css') }}">
    </x-slot:styleSheet>
    <x-slot:pageContent>
        <h2>Create your Quiz</h2>
        <form action="{{ route('generate-quiz') }}" method="POST" id="quiz-name-form">
            @csrf
            <div class="quiz-panel">
                {{-- Quiz Name Card --}}
                <div class="card">
                    <h3>What is your quiz name? <span>*</span></h3>
                    <div class="quiz-name">
                        <input type="text" name="quiz-name" placeholder="Ex. OOP Revision">
                    </div>
                </div>
            </div>
            <div class="submit-button">
                <button>Create <i class="fa-solid fa-check"></i></button>
            </div>
        </form>
    </x-slot:pageContent>
    <x-slot:javaScript>
        <script>
            const quizNameInput = document.querySelector(
                ".quiz-panel .card .quiz-name input"
            );
            document.getElementById("quiz-name-form").addEventListener("submit", function(event) {
                if (quizNameInput.value.trim().length == 0) {
                    event.preventDefault();
                    alert("Quiz name is required. Please enter a value.");
                }
            });
        </script>
    </x-slot:javaScript>
</x-admin-dashboard-layout>
