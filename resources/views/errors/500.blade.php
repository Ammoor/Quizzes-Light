<x-page-layout>
    <x-slot:pageDescription>
        <meta name="description" content="" />
    </x-slot:pageDescription>
    <x-slot:title>
        500 | Internal Server Error
    </x-slot:title>
    <x-slot:styleSheet>
        <link rel="stylesheet" href="{{ asset('CSS/500.css') }}">
    </x-slot:styleSheet>
    <x-slot:pageContent>
        <div class="server-error-container">
            <div class="server-error-image">
                <img src="{{ asset('Imgs/500.png') }}" alt="500-image">
            </div>
            <div class="paragraph-container">
                <p class="server-error-title">Internal <span>Server</span> Error</p>
                <p class="server-error-paragraph">We are currently facing a technical issue. Please try again later. If
                    the problem persists, you can help us resolve it more quickly by reporting the bug.
                </p>
            </div>
            <div class="bug-form-container">
                <a href="https://forms.gle/sDtcL4o11ALppyEu9" target="_blank">Bug Reporting Form</a>
            </div>
        </div>
    </x-slot:pageContent>
    <x-slot:javaScript>
    </x-slot:javaScript>
</x-page-layout>
