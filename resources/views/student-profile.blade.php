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
            {{-- Student ID --}}
            <div class="info">
                <h3>Student ID:</h3>
                <p>{{ Auth::user()->id }}</p>
            </div>
            {{-- First Name --}}
            <div class="info">
                <h3>First name:</h3>
                <p>{{ Auth::user()->first_name }}</p>
            </div>
            {{-- last Name --}}
            <div class="info">
                <h3>Last name:</h3>
                <p>{{ Auth::user()->last_name }}</p>
            </div>
            {{-- E-mail address --}}
            <div class="info">
                <h3>E-mail address:</h3>
                <p>{{ Auth::user()->email }}</p>
            </div>
        </div>
        <div class="delete-user-form">
            <form action="{{ route('delete-current-student') }}" method="POST">
                @csrf
                <h2>Danger zone <span><i class="fa-solid fa-triangle-exclamation"></i></span></h2>
                <div class="danger-zone">
                    <h2>Delete My Account Permanently</h2>
                    <span>Quick reminder</span>
                    <div class="inform-message">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <p>Deleting your account will permanently remove your profile, quiz results, and all associated
                            activity. You will no longer be able to access your dashboard or view your previous scores.
                            This action cannot be undone.
                        </p>
                    </div>
                    <button type="button" onclick="deleteUser()">Delete</button>
                </div>
            </form>
        </div>
    </x-slot:pageContent>
    <x-slot:javaScript>
        <script>
            function deleteUser() {
                if (confirm(
                        'Are you sure? This will permanently delete your account and all your quiz results. This action cannot be undone.'
                    )) {
                    document.querySelector("main .delete-user-form form").submit();
                }
            }
        </script>
    </x-slot:javaScript>
</x-student-dashboard-layout>
