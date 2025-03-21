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
        <form action="{{ route('generate-quiz') }}" method="POST">
            @csrf
            <div class="quiz-panel">
                {{-- Specialization Card --}}
                <div class="card active">
                    <h3>What is the main specialization of this quiz? <span>*</span></h3>
                    <div class="choices">
                        @foreach ($specializationData as $item)
                            <div class="choice">
                                <input type="radio" id="{{ $item->name }}" name="specialization"
                                    value="{{ $item->name }}">
                                <label for="{{ $item->name }}">{{ $item->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                {{-- Number Of Questions Card --}}
                <div class="card">
                    <h3>How many questions would you like to include in the quiz? <span>*</span></h3>
                    <div class="choices">
                        @for ($i = 1, $count = 5; $i <= 4; $i++, $count += 5)
                            <div class="choice">
                                <input type="radio" id="{{ 'option-' . $i }}" name="questions-number"
                                    value="{{ $count }}">
                                <label for="{{ 'option-' . $i }}">{{ $count }} questions</label>
                            </div>
                        @endfor
                    </div>
                </div>
                {{-- Time Card --}}
                <div class="card">
                    <h3>How much time do you want to allocate for the quiz? <span>*</span></h3>
                    <div class="choices">
                        @for ($i = 1, $count = 5; $i <= 4; $i++, $count += 5)
                            <div class="choice">
                                <input type="radio" id="{{ 'time-' . $i }}" name="quiz-time"
                                    value="{{ $count }}">
                                <label for="{{ 'time-' . $i }}">{{ $count }} min</label>
                            </div>
                        @endfor
                    </div>
                </div>
                {{-- Time Slot Card --}}
                <div class="card">
                    <h3>When would you like the quiz to start? <span>*</span></h3>
                    <div class="choices">
                        @php
                            $timeSlots = [5, 10, 30, 60]; // Time in minutes.
                        @endphp
                        @for ($i = 0; $i < sizeof($timeSlots); $i++)
                            <div class="choice">
                                <input type="radio" id="{{ 'slot-' . $i + 1 }}" name="time-slot"
                                    value="{{ $timeSlots[$i] }}">
                                <label for="{{ 'slot-' . $i + 1 }}">After {{ $timeSlots[$i] }} min</label>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
            {{-- Handled By JS --}}
            <div class="crnt-card-num"></div>
            <div class="quiz-panel-buttons">
                <div class="btn-1">
                    <button type="button" class="not-allowed" onclick="prevCard()"><i
                            class="fa-solid fa-arrow-left"></i> Previous</button>
                </div>
                <div class="btn-2">
                    <button type="button" onclick="nextCard()">Next <i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
        </form>
    </x-slot:pageContent>
    <x-slot:javaScript>
        <script src="{{ asset('JavaScript/generate-quiz.js') }}"></script>
    </x-slot:javaScript>
</x-admin-dashboard-layout>
