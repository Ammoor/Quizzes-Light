<nav>
    <a href="{{ url('home') }}"
        style="@if (request()->is('home')) background-color: var(--main-color-1); color: #2e3133;
        border-radius: 0.5rem; @endif">Home</a>
    <a href="{{ request()->is('home') ? '#services-section' : url('home#services-section') }}">Our Services</a>
    <a href="{{ url('about-us') }}"
        style="@if (request()->is('about-us')) background-color: var(--main-color-1); color: #2e3133;
        border-radius: 0.5rem; @endif">About
        Us</a>
    <a href="{{ request()->is('home') ? '#contact-section' : url('home#contact-section') }}">Contact Us</a>
</nav>
