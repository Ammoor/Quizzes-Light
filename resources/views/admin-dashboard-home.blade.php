<x-admin-dashboard-layout>
    <x-slot:pageDescription>
        <meta name="description" content="" />
    </x-slot:pageDescription>
    <x-slot:title>
        Admin Dashboard | Welcome
    </x-slot:title>
    <x-slot:styleSheet>
        <link rel="stylesheet" href="{{ asset('CSS/admin-dashboard-home.css') }}">
    </x-slot:styleSheet>
    <x-slot:pageContent>
        <div class="page-content">
            <h2><span>{{ Auth::user()->first_name }}</span> welcome back!</h2>
            <div class="make-quiz">
                <h3>Make your quiz</h3>
                <div class="quiz-button">
                    <a href="generate-quiz">Creat a quiz</a>
                </div>
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
