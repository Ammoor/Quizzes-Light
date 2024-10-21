<x-admin-dashboard-layout>
    <x-slot:pageDescription>
        <meta name="description" content="" />
    </x-slot:pageDescription>
    <x-slot:title>
        Creat Test Dashboard
    </x-slot:title>
    <x-slot:styleSheet>
        <link rel="stylesheet" href="{{ asset('CSS/generate-quiz.css') }}">
    </x-slot:styleSheet>
    <x-slot:pageContent>
        <h2>Creat your Quiz</h2>
        <div class="quiz-panel">
            {{-- Specialization Card --}}
            <div class="card active">
                <h3>What is the main specialization of this quiz?</h3>
                <div class="choices">
                    @foreach ($data as $item)
                        <div class="choice">
                            <input type="radio" id="{{ $item->name }}" name="specialization">
                            <label for="{{ $item->name }}">{{ $item->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- Number Of Questions Card --}}
            <div class="card">
                <h3>How many questions would you like to include in the quiz?</h3>
                <div class="choices">
                    <?php
                        $options = 4;$count=5;
                        for ($i = 1; $i <= $options; $i++):
                    ?>
                    <div class="choice">
                        <input type="radio" id="{{ 'option' . '-' . $i }}" name="questions-number">
                        <label for="{{ 'option' . '-' . $i }}">{{ $count }}</label>
                    </div>
                    <?php
                        $count+=5;
                        endfor;
                    ?>
                </div>
            </div>
            {{-- Time Card --}}
            <div class="card">
                <h3>How much time do you want to allocate for the quiz?</h3>
                <div class="choices">
                    <?php
                        $options = 4;$count=5;
                        for ($i = 1; $i <= $options; $i++):
                    ?>
                    <div class="choice">
                        <input type="radio" id="{{ 'time' . '-' . $i }}" name="quiz-time">
                        <label for="{{ 'time' . '-' . $i }}">{{ $count }} min</label>
                    </div>
                    <?php
                        $count+=5;
                        endfor;
                    ?>
                </div>
            </div>
            {{-- Date Card --}}
            <div class="card">
                <h3>When would you like the quiz to start?</h3>
                <div class="date">
                    <input type="datetime-local">
                </div>
            </div>
        </div>
        {{-- Handled By JS --}}
        <div class="crnt-card-num"></div>
        <div class="quiz-panel-buttons">
            <div class="btn-1">
                <button onclick="prevCard()"><i class="fa-solid fa-arrow-left"></i> Previous</button>
            </div>
            <div class="btn-2">
                <button onclick="nextCard()">Next <i class="fa-solid fa-arrow-right"></i></button>
            </div>
        </div>
    </x-slot:pageContent>
    <x-slot:javaScript>
        <script src="{{ asset('JavaScript/generate-quiz.js') }}"></script>
    </x-slot:javaScript>
</x-admin-dashboard-layout>
