<x-admin-dashboard-layout>
    <x-slot:pageDescription>
        <meta name="description" content="" />
    </x-slot:pageDescription>
    <x-slot:title>
        Admin Dashboard | Welcome
    </x-slot:title>
    <x-slot:styleSheet>
        <link rel="stylesheet" href="{{ asset('CSS/admin-dashboard-home.css') }}">
        @if (session('deleteMessage'))
            <style>
                .page-content h2:first-of-type {
                    display: block;
                    animation-name: move-down;
                    animation-duration: 1s;
                }
            </style>
        @endif
    </x-slot:styleSheet>
    <x-slot:pageContent>
        <div class="page-content">
            <h2>Your quiz has been deleted successfully! <i class="fa-solid fa-check"></i></h2>
            <h2><span>{{ Auth::user()->first_name }}</span> welcome back!</h2>
            <div class="make-quiz">
                <h3>Make your quiz</h3>
                <div class="quiz-button">
                    <a href="generate-quiz">Creat a quiz</a>
                </div>
            </div>
        </div>
    </x-slot:pageContent>
    <x-slot:javaScript>
        <script src=""></script>
    </x-slot:javaScript>
</x-admin-dashboard-layout>
