<x-page-layout>
    <x-slot:pageDescription>
        <meta name="description" content="" />
    </x-slot:pageDescription>
    <x-slot:title>
        404 | Page Not Found
    </x-slot:title>
    <x-slot:styleSheet>
        <link rel="stylesheet" href="{{ asset('CSS/404.css') }}">
    </x-slot:styleSheet>
    <x-slot:pageContent>
        <div class="not-found-container">
            <div class="not-found-image">
                <img src="{{ asset('Imgs/404.png') }}" alt="404-image">
            </div>
            <div class="paragraph-container">
                <p class="not-found-title">Page <span>not</span> Found</p>
                <p class="not-found-paragraph">We couldn't locate what you were searching for. It may have been
                    relocated,
                    removed, or never existed.
                    Let’s redirect you — return home and give it another shot!</p>
            </div>
        </div>
    </x-slot:pageContent>
    <x-slot:javaScript>
    </x-slot:javaScript>
</x-page-layout>
