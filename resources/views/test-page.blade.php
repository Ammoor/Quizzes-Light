<x-student-dashboard-layout>
    <x-slot:pageDescription>
        <meta name="description" content="" />
    </x-slot:pageDescription>
    <x-slot:title>
        Test Page
    </x-slot:title>
    <x-slot:styleSheet>
        <link rel="stylesheet" href="{{ asset('CSS/test-page.css') }}">
    </x-slot:styleSheet>
    <x-slot:pageContent>
        <form action="{{ route('check-quiz-answers') }}" method="POST">
            @csrf
            <input hidden type="text" name="quizID" value="{{ $questionsData['quizID'] }}">
            @for ($index = 0, $cnt = 1; $index < count($questionsData['questions']); $index++)
                <div class="question-card">
                    <h2>{{ $questionsData['questions'][$index] }} <span>*</span></h2>
                    <div class="answers">
                        @foreach ($questionsData['answers'][$index] as $i => $answer)
                            <div class="answer">
                                <input type="radio" id="{{ 'question-' . $cnt }}" name="{{ 'question-' . $index }}"
                                    value="{{ $answer }}">
                                <label for="{{ 'question-' . $cnt }}">{{ chr(65 + $i) . ' ) ' . $answer }}</label>
                            </div>
                            @php
                                $cnt++;
                            @endphp
                        @endforeach
                    </div>
                </div>
            @endfor
            {{-- Handled By JS --}}
            <div class="crnt-card-number"></div>
            <div class="form-buttons">
                <button type="button" class="prev not-allowed" onclick="prevCard()"><i
                        class="fa-solid fa-arrow-left"></i>
                    Previous</button>
                <button type="button" class="submit" onclick="submitForm()">Submit <i
                        class="fa-solid fa-check"></i></button>
                <button type="button" class="next" onclick="nextCard()">Next <i
                        class="fa-solid fa-arrow-right"></i></button>
            </div>
        </form>
    </x-slot:pageContent>
    <x-slot:javaScript>
        <script src="{{ asset('JavaScript/test-page.js') }}"></script>
    </x-slot:javaScript>
</x-student-dashboard-layout>
