<x-page-layout>
    <x-slot:pageDescription>
        <meta name="description" content="" />
    </x-slot:pageDescription>
    <x-slot:title>
        Online testing registration
    </x-slot:title>
    <x-slot:styleSheet>
        <link rel="stylesheet" href="{{ asset('CSS/guards.css') }}">
    </x-slot:styleSheet>
    <x-slot:pageContent>
        <div class="cards-section">
            <div class="main-header">
                <h2>Register free for online testing</h2>
                <p>Secure, Reliable, Professional.</p>
            </div>
            <div class="cards">
                <div class="card-1">
                    <a href="registration-page-student">
                        <h3>Register as Student</h3>
                        <img src="{{ asset('Imgs/student.png') }}" alt="student image">
                    </a>
                    <p>Register here if you have been instructed to take a Test by <br /> an instructor or
                        administrator.</p>
                </div>
                <div class="card-2">
                    <a href="registration-page-admin">
                        <h3>Register as Administrator</h3>
                        <img src="{{ asset('Imgs/teacher.png') }}" alt="teacher image">
                    </a>
                    <p>Register here if you are an administrator looking to manage tests <br /> and student performance.
                    </p>
                </div>
            </div>
        </div>
    </x-slot:pageContent>
    <x-slot:javaScript>
    </x-slot:javaScript>
</x-page-layout>
