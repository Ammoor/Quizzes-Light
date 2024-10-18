<header>
    <div class="website-logo">
        <h1><span><span>Quizzes</span> Light</span><span>Discover, Learn, and Conquer!</span></h1>
    </div>
    <div class="auth">
        <div class="drop-down">
            {{-- © FreeFrontend by Ivan Grozdic --}}
            <div class="sec-center">
                <input class="dropdown" type="checkbox" id="dropdown" name="dropdown" />
                <label class="for-dropdown" for="dropdown">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                    <i class="fa-solid fa-arrow-down"></i></label>
                <div class="section-dropdown">
                    <a href="admin-profile">My profile <i class="fa-solid fa-arrow-right"></i></a>
                    <form action="{{ 'logout-admin' }}" method="POST">
                        @csrf
                        <a href="logout" onclick="event.preventDefault();this.closest('form').submit();">
                            Log Out <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </form>
                </div>
            </div>
            {{-- © FreeFrontend by Ivan Grozdic --}}
        </div>
    </div>
</header>
