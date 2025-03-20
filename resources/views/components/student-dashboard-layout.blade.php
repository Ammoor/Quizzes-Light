<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{ $pageDescription }}
    <title>{{ $title }}</title>
    {{ $styleSheet }}
    <link rel="stylesheet" href="{{ asset('CSS/all.min.css') }}" />
    <link rel="shortcut icon" type="x-icon" href="{{ asset('Imgs/Fav-icon.png') }}" />
</head>

<body>
    <x-student-dashboard-header></x-student-dashboard-header>
    <x-nav-bar></x-nav-bar>
    <main>
        {{ $pageContent }}
    </main>
    <div class="scroll-up-button">
        <button><i class="fa-solid fa-arrow-up"></i></button>
    </div>
    {{ $javaScript }}
    <script src="{{ asset('./JavaScript/scroll-top-button.js') }}"></script>
</body>

</html>
