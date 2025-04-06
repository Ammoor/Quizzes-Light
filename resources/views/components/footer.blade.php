<footer>
    <div class="website-logo">
        <img src="{{ asset('Imgs/Logo-1.png') }}" alt="website-logo">
    </div>
    <div class="footer-content">
        <a href="#">Privacy Policy</a>
        <a href="#">Terms of Service</a>
        <a href="{{ request()->is('about-us') ? '#about-us' : 'about-us' }}">About Us</a>
        <a href="{{ request()->is('home') ? '#contact-section' : 'home#contact-section' }}">Contact Us</a>
        <a href="#">Careers</a>
        <a href="#">Support</a>
    </div>
    <div class="footer-icons">
        <i class="fa-brands fa-youtube"></i>
        <i class="fa-brands fa-twitter"></i>
        <i class="fa-brands fa-linkedin-in"></i>
        <i class="fa-brands fa-github"></i>
        <i class="fa-solid fa-envelope"></i>
    </div>
    {{-- Handled By JS --}}
    <p></p>
</footer>
