@if (Auth::guard('administrator')->check() || Auth::guard('web')->check())
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
@endif
@if (Route::has('login'))
    <header>
        <div class="website-logo">
            <h1><span><span>Quizzes</span> Light</span><span>Discover, Learn, and Conquer!</span></h1>
        </div>
        <div class="auth">
            <div class="links">
                @if (Auth::guard('administrator')->check())
                    <a href="{{ url('/admin-dashboard-home') }}">
                        Dashboard
                    </a>
                    <form action="{{ 'logout-admin' }}" method="POST">
                        @csrf
                        <a href="logout" onclick="event.preventDefault();this.closest('form').submit();">
                            Log Out
                        </a>
                    </form>
                @elseif (Auth::guard('web')->check())
                    <a href="{{ url('/student-dashboard-home') }}">
                        Dashboard
                    </a>
                    <form action="{{ 'logout' }}" method="POST">
                        @csrf
                        <a href="logout" onclick="event.preventDefault();this.closest('form').submit();">
                            Log Out
                        </a>
                    </form>
                @else
                    <a href="login-page-student">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ 'guards' }}">
                            Register
                        </a>
                    @endif
                @endif
            </div>
        </div>
    </header>
@endif
