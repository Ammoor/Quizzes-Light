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
    <x-header></x-header>
    <x-nav-bar></x-nav-bar>
    <div class="documentation">
        <a href="{{ url('https://github.com/Ammoor/Quizzes-Light') }}" target="_blank">documentation</a>
    </div>
    <main>
        {{ $pageContent }}
    </main>
    <div class="scroll-up-button">
        <button><i class="fa-solid fa-arrow-up"></i></button>
    </div>
    <x-footer></x-footer>
    {{ $javaScript }}
    <script src="{{ asset('JavaScript/scroll-top-button.js') }}"></script>
    <script>
        const copyRightsParagraph = document.querySelector("footer p");
        const currentYear = new Date().getFullYear();
        copyRightsParagraph.innerHTML = `&copy; ${currentYear} <span>Quizzes</span> Light. All rights reserved.`;
    </script>
</body>

</html>
