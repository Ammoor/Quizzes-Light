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
        <span>Quick reminder</span>
        <div class="quick-reminder">
            <span><i class="fa-solid fa-lightbulb"></i></span>
            <p>Please note, your answers will be saved and submitted automatically once time runs out, so try to
                complete all answers in time.</p>
        </div>
        {{-- Handled By JS --}}
        <div class="quiz-timer">
            <p></p>
        </div>
        <form action="{{ route('check-quiz-answers') }}" method="POST">
            @csrf
            <input hidden type="text" name="quizID" value="{{ $quizData['quizID'] }}">
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
        <script>
            let currentCardIndex = 0;
            const quizData = @json($quizData);
            const quizTimer = document.querySelector('main .quiz-timer p');
            const quizForm = document.querySelector("main form");
            const cards = document.querySelectorAll("main .question-card");
            const currentCardNumber = document.querySelector(".crnt-card-number");
            const prevButton = document.querySelector("main .form-buttons .prev");
            const nextButton = document.querySelector("main .form-buttons .next");

            function showCard(index) {
                cards.forEach((card, i) => {
                    card.classList.toggle("active", i === index);
                });
            }

            function prevCard() {
                if (currentCardIndex > 0) {
                    if (currentCardIndex == 1) {
                        prevButton.classList.add("not-allowed");
                    }
                    nextButton.classList.remove("not-allowed");
                    currentCardIndex--;
                    showCard(currentCardIndex);
                    showCurrentCardNumber(currentCardIndex);
                }
            }

            function submitForm() {
                if (
                    confirm(
                        "Are you sure you want to submit the quiz? Once submitted, your answers cannot be changed."
                    )
                ) {
                    clearInterval(intervalId);
                    localStorage.removeItem('quizTimer');
                    localStorage.removeItem('quiz-end');
                    quizForm.submit();
                }
            }

            function nextCard() {
                if (currentCardIndex < cards.length - 1) {
                    if (currentCardIndex == cards.length - 2) {
                        nextButton.classList.add("not-allowed");
                    }
                    prevButton.classList.remove("not-allowed");
                    currentCardIndex++;
                    showCard(currentCardIndex);
                    showCurrentCardNumber(currentCardIndex);
                }
            }

            function showCurrentCardNumber() {
                currentCardNumber.innerHTML = currentCardIndex + 1 + " / " + cards.length;
            }

            // To show the first card.
            showCurrentCardNumber(currentCardIndex);
            showCard(currentCardIndex);

            if (!localStorage.getItem('quizTimer')) {
                localStorage.setItem('quizTimer', quizData['quizTime'] * 60);
            }

            function clcLeftTime(time) {
                const minutes = Math.floor(time / 60);
                const seconds = time % 60;
                return `${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds} minutes <i class="fa-regular fa-clock"></i>`;
            }

            quizTimer.innerHTML = clcLeftTime(localStorage.getItem('quizTimer'));

            if (localStorage.getItem('quiz-end')) {
                quizTimer.classList.add('quiz-end');
            }

            function decreaseQuizTimer() {
                let leftTime = localStorage.getItem('quizTimer') - 1;
                if (leftTime == 60) {
                    localStorage.setItem('quiz-end', true);
                    localStorage.setItem('quizTimer', leftTime);
                    quizTimer.innerHTML = clcLeftTime(leftTime);
                } else if (leftTime == 0) {
                    clearInterval(intervalId);
                    localStorage.removeItem('quizTimer');
                    localStorage.removeItem('quiz-end');
                    quizTimer.innerHTML = clcLeftTime(leftTime);
                    quizForm.submit();
                } else {
                    localStorage.setItem('quizTimer', leftTime);
                    quizTimer.innerHTML = clcLeftTime(leftTime);
                }
                if (localStorage.getItem('quiz-end')) {
                    quizTimer.classList.add('quiz-end');
                }
            }

            const intervalId = setInterval(decreaseQuizTimer, 1000);
        </script>
    </x-slot:javaScript>
</x-student-dashboard-layout>
