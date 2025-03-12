<x-admin-dashboard-layout>
    <x-slot:pageDescription>
        <meta name="description" content="" />
    </x-slot:pageDescription>
    <x-slot:title>
        Students Statistics
    </x-slot:title>
    <x-slot:styleSheet>
        <link rel="stylesheet" href="{{ asset('CSS/students-statistics.css') }}">
    </x-slot:styleSheet>
    <x-slot:pageContent>
        <h2>Students Statistics</h2>
        @if (count($studentsData))
            @foreach ($studentsData as $cnt => $studentData)
                <div class="student-details">
                    <h2>Student {{ $cnt + 1 }} details</h2>
                    {{-- Student ID --}}
                    <div class="student-info">
                        <h3>Student ID:</h3>
                        <p>{{ $studentData['studentId'] }}</p>
                    </div>
                    {{-- Student E-mail Address --}}
                    <div class="student-info">
                        <h3>Student e-mail address:</h3>
                        <p>{{ $studentData['email'] }}</p>
                    </div>
                    {{-- Student First Name --}}
                    <div class="student-info">
                        <h3>Student first name:</h3>
                        <p>{{ $studentData['firstName'] }}</p>
                    </div>
                    {{-- Student Last Name --}}
                    <div class="student-info">
                        <h3>Student last name:</h3>
                        <p>{{ $studentData['lastName'] }}</p>
                    </div>
                    {{-- Student Grade --}}
                    <div class="student-info">
                        <h3>Student grade:</h3>
                        @if ($studentData['quizGrade'] === null)
                            <p class="no-grade">No attempts</p>
                        @else
                            <p class="grade">{{ $studentData['quizGrade'] }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <div class="no-responses">
                <h2>No student has attempted this quiz yet. Waiting for responses! <span><i
                            class="fa-solid fa-graduation-cap"></i></span></h2>
            </div>
        @endif
    </x-slot:pageContent>
    <x-slot:javaScript>
    </x-slot:javaScript>
</x-admin-dashboard-layout>
