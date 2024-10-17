<x-student-dashboard-layout>
    <x-slot:pageDescription>
        <meta name="description" content="" />
    </x-slot:pageDescription>
    <x-slot:title>
        Student Dashboard | Welcome
    </x-slot:title>
    <x-slot:styleSheet>
        <link rel="stylesheet" href="{{ asset('CSS/student-dashboard-home.css') }}">
    </x-slot:styleSheet>
    <x-slot:pageContent>
        <div class="page-content">
            <h2><span>{{ Auth::user()->first_name }}</span> welcome back!</h2>
        </div>
    </x-slot:pageContent>
    <x-slot:javaScript>
        <script src=""></script>
    </x-slot:javaScript>
</x-student-dashboard-layout>
