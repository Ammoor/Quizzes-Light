<x-admin-dashboard-layout>
    <x-slot:pageDescription>
        <meta name="description" content="" />
    </x-slot:pageDescription>
    <x-slot:title>
        Quiz details
    </x-slot:title>
    <x-slot:styleSheet>
        <link rel="stylesheet" href="{{ asset('CSS/quiz-generated.css') }}">
        @if (session('createMessage') || session('updateMessage'))
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
            } elseif (session('updateMessage')) {
                $alertMessage = 'Your quiz has been updated successfully!';
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
            {{-- Quiz Specialization --}}
            <div class="quiz-info">
                <h3>Quiz specialization:</h3>
                <p>{{ $quizData->specialization_name }}</p>
            </div>
            {{-- Quiz Number Of Questions --}}
            <div class="quiz-info">
                <h3>Number of questions:</h3>
                <p>{{ $quizData->questions_number }}</p>
            </div>
            {{-- Quiz Time --}}
            <div class="quiz-info">
                <h3>Quiz time:</h3>
                <p>{{ $quizData->time }} minutes</p>
            </div>
        </div>
        {{-- Update Quiz Form --}}
        <form action="{{ route('update-quiz') }}" method="POST" class="update-quiz-form">
            @csrf
            <button type="button" onclick="expandEditView()">
                <h2>Update the quiz <span><i class="fa-regular fa-pen-to-square"></i></span></h2>
            </button>
            <div class="edit-view not-active">
                <div class="content">
                    <span>Quick reminder</span>
                    <div class="inform-message">
                        <span><i class="fa-solid fa-lightbulb"></i></span>
                        <p>
                            Updating this quiz may overwrite some existing data, including current settings, questions,
                            or
                            scoring. Ensure you have reviewed all changes before proceeding.
                        </p>
                    </div>
                    {{-- Specialization Card --}}
                    <div class="card">
                        <h3>What is the main specialization of this quiz?</h3>
                        <div class="choices">
                            @foreach ($specializations as $specialization)
                                @if ($specialization->name != $quizData->specialization_name)
                                    <div class="choice">
                                        <input type="radio" id="{{ $specialization->name }}" name="specialization"
                                            value="{{ $specialization->name }}">
                                        <label for="{{ $specialization->name }}">{{ $specialization->name }}</label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    {{-- Number Of Questions Card --}}
                    <div class="card">
                        <h3>How many questions would you like to include in the quiz?</h3>
                        <div class="choices">
                            @for ($i = 1, $count = 5; $i <= 4; $i++, $count += 5)
                                @if ($count != $quizData->questions_number)
                                    <div class="choice">
                                        <input type="radio" id="{{ 'option-' . $i }}" name="questions-number"
                                            value="{{ $count }}">
                                        <label for="{{ 'option-' . $i }}">{{ $count }} questions</label>
                                    </div>
                                @endif
                            @endfor
                        </div>
                    </div>
                    {{-- Time Card --}}
                    <div class="card">
                        <h3>How much time do you want to allocate for the quiz?</h3>
                        <div class="choices">
                            @for ($i = 1, $count = 5; $i <= 4; $i++, $count += 5)
                                @if ($count != $quizData->time)
                                    <div class="choice">
                                        <input type="radio" id="{{ 'time-' . $i }}" name="quiz-time"
                                            value="{{ $count }}">
                                        <label for="{{ 'time-' . $i }}">{{ $count }} min</label>
                                    </div>
                                @endif
                            @endfor
                        </div>
                    </div>
                    {{-- Time Slot Card --}}
                    <div class="card">
                        <h3>When would you like the quiz to start?</h3>
                        <div class="choices">
                            @php
                                $timeSlots = [5, 10, 30, 60]; // Time in minutes.
                            @endphp
                            @for ($i = 0; $i < sizeof($timeSlots); $i++)
                                @if ($timeSlots[$i] != $quizData->time_slot)
                                    <div class="choice">
                                        <input type="radio" id="{{ 'slot-' . $i + 1 }}" name="time-slot"
                                            value="{{ $timeSlots[$i] }}">
                                        <label for="{{ 'slot-' . $i + 1 }}">After {{ $timeSlots[$i] }} min</label>
                                    </div>
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>
                <input hidden type="text" name="quizID" value="{{ $quizData->id }}">
                <input hidden type="text" name="quizTimeSlot" value="{{ $quizData->time_slot }}">
                <div class="form-buttons">
                    <button type="button" onclick="updateQuiz()">Update</button>
                    <button type="button" onclick="expandEditView()">Cancel</button>
                </div>
            </div>
        </form>
        {{-- Delete Quiz Form --}}
        <form action="{{ route('delete-quiz') }}" method="POST" class="delete-quiz-form">
            @csrf
            <h2>Danger zone <span><i class="fa-solid fa-triangle-exclamation"></i></span></h2>
            <div class="danger-zone">
                <h2>Delete the quiz</h2>
                <span>Quick reminder</span>
                <div class="inform-message">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <p>Deleting this quiz will permanently remove all questions, answers, and any results associated
                        with it. This action cannot be undone, and the quiz will no longer be accessible to any users.
                    </p>
                </div>
                <input hidden type="text" name="quizID" value="{{ $quizData->id }}">
                <button type="button" onclick="deleteQuiz()">Delete</button>
            </div>
        </form>
    </x-slot:pageContent>
    <x-slot:javaScript>
        <script src="{{ asset('JavaScript/quiz-generated.js') }}"></script>
    </x-slot:javaScript>
</x-admin-dashboard-layout>
