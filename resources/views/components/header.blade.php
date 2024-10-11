@auth
    <style>
        header .auth a:first-child {
            background-color: var(--main-color-3);
        }

        header .auth a:last-child {
            background-color: #454f59;
        }

        header .auth a:first-child:hover {
            background-color: var(--main-color-3);

        }

        header .auth a:last-child:hover {
            background-color: #8f959b;
        }

        header .auth .links form {
            display: inline-block
        }
    </style>
@endauth
@if (Route::has('login'))
    <header>
        <div class="website-logo">
            <h1><span><span>Quizzes</span> Light</span><span>Discover, Learn, and Conquer!</span></h1>
        </div>
        <div class="auth">
            <div class="links">
                @auth
                    <a href="{{ url('/dashboard') }}">
                        Dashboard
                    </a>
                    <form action="{{ 'logout' }}" method="POST">
                        @csrf
                        <a href="logout" onclick="event.preventDefault();this.closest('form').submit();">
                            Log Out
                        </a>
                    </form>
                @else
                    <a href="login-page">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ 'guards' }}">
                            Register
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </header>
@endif
