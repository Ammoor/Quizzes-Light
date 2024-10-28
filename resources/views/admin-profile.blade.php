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
    </x-slot:pageContent>
    <x-slot:javaScript>
        <!-- JavaScript to handle dropdown behavior -->
        <script>
            document.querySelectorAll('.menu-toggle').forEach(input => {
                input.addEventListener('change', function() {
                    // Close all other checkboxes when one is opened
                    if (this.checked) {
                        document.querySelectorAll('.menu-toggle').forEach(otherInput => {
                            if (otherInput !== this) {
                                otherInput.checked = false;
                            }
                        });
                    }
                });
            });

            function toggleSidebar() {
                const sidebar = document.getElementById('sidebar');
                sidebar.classList.toggle('open');
                if (sidebar.classList.contains('open')) {
                    document.querySelector('main').style.marginLeft = '20rem';
                } else {
                    document.querySelector('main').style.marginLeft = '0';
                }
            }

            const scrollUpButton = document.querySelector('.scroll-up-button button');
            window.addEventListener('scroll', function() {
                if (window.scrollY >= 500) {
                    scrollUpButton.parentElement.style.animation = 'move-button-left 1s forwards';
                    setTimeout(() => {
                        scrollUpButton.parentElement.style.display = 'block';
                    }, 500);
                } else {
                    scrollUpButton.parentElement.style.animation = 'move-button-right 1s forwards';
                    setTimeout(() => {
                        scrollUpButton.parentElement.style.display = 'none';
                    }, 500);
                }
            });
            scrollUpButton.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                });
            });
        </script>
    </x-slot:javaScript>
</x-admin-dashboard-layout>
