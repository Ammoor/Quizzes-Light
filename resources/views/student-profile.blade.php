<x-student-dashboard-layout>
    <x-slot:pageDescription>
        <meta name="description" content="" />
    </x-slot:pageDescription>
    <x-slot:title>
        My profile
    </x-slot:title>
    <x-slot:styleSheet>
        <link rel="stylesheet" href="{{ asset('CSS/student-profile.css') }}">
    </x-slot:styleSheet>
    <x-slot:pageContent>
        <h2>My profile</h2>
        <div class="details-section">
            {{-- First Name --}}
            <div class="info">
                <h3>First Name:</h3>
                <p>{{ Auth::user()->first_name }}</p>
            </div>
            {{-- last Name --}}
            <div class="info">
                <h3>Last Name:</h3>
                <p>{{ Auth::user()->last_name }}</p>
            </div>
            {{-- E-mail address --}}
            <div class="info">
                <h3>E-mail address:</h3>
                <p>{{ Auth::user()->email }}</p>
            </div>
        </div>
    </x-slot:pageContent>
    <x-slot:javaScript>
        <script src=""></script>
    </x-slot:javaScript>
</x-student-dashboard-layout>
