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
                @else
                    <a href="{{ route('login') }}">
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
