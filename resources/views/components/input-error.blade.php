<style>
    .error-message-style {
        color: red;
        font-size: 1.5rem;
        margin-top: 1rem
    }

    .error-message-style li {
        margin-bottom: 1rem
    }
</style>
@props(['messages'])
@if ($messages)
    <ul {{ $attributes->merge(['class' => 'error-message-style']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
