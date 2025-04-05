<x-admin-dashboard-layout>
    <x-slot:pageDescription>
        <meta name="description" content="" />
    </x-slot:pageDescription>
    <x-slot:title>
        My profile
    </x-slot:title>
    <x-slot:styleSheet>
        <link rel="stylesheet" href="{{ asset('CSS/admin-profile.css') }}">
    </x-slot:styleSheet>
    <x-slot:pageContent>
        <h2>My profile</h2>
        <div class="details-section">
            {{-- Admin ID --}}
            <div class="info">
                <h3>Admin ID:</h3>
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
            <form action="{{ route('delete-current-admin') }}" method="POST">
                @csrf
                <h2>Danger zone <span><i class="fa-solid fa-triangle-exclamation"></i></span></h2>
                <div class="danger-zone">
                    <h2>Delete My Account Permanently</h2>
                    <span>Quick reminder</span>
                    <div class="inform-message">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <p>Deleting your account will permanently remove all your data, including created quizzes,
                            questions, and students results. This action cannot be undone, and you will lose
                            access to your dashboard.
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
                        'Are you sure? This will permanently delete your account and all related data. This action cannot be undone.'
                    )) {
                    document.querySelector("main .delete-user-form form").submit();
                }
            }
        </script>
    </x-slot:javaScript>
</x-admin-dashboard-layout>
