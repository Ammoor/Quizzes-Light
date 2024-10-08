<nav>
    <a href="{{ 'home' }}"
        style="@if (request()->is('home')) background-color: var(--main-color-1); color: #2e3133;
        border-radius: 0.5rem; @endif">Home</a>
    <a href="{{ '#Services' }}">Services</a>
    <a href="{{ '#About Us' }}">About Us</a>
    <a href="{{ request()->is('home') ? '#contact-section' : 'home#contact-section' }}">Contact Us</a>
</nav>
