<x-page-layout>
    <x-slot:pageDescription>
        <meta name="description" content="" />
    </x-slot:pageDescription>
    <x-slot:title>
        Login into account
    </x-slot:title>
    <x-slot:styleSheet>
        <link rel="stylesheet" href="{{ asset('CSS/login-page.css') }}">
    </x-slot:styleSheet>
    <x-slot:pageContent>
        <div class="main-header">
            <h2>Welcome Back! Your Dashboard Awaits</h2>
            <p>Secure, Reliable, Professional.</p>
        </div>
        <div class="form-container">
            <div class="website-logo">
                <img src="{{ asset('Imgs/Logo-2.png') }}" alt="webiste-logo">
            </div>
            <div class="form">
                <form action="" method="POST">
                    <label for="email">E-mail <span>*</span></label>
                    <input id="email" type="email" name="email" required>
                    <label for="password">Password <span>*</span></label>
                    <input id="password" type="password" name="password" required>
                    <div class="checkbox-container">
                        {{-- © CSS Scan, #30 by Saeed Alipoor --}}
                        <div class="checkbox-wrapper-30">
                            <span class="checkbox">
                                <input id="checkbox" type="checkbox" />
                                <svg>
                                    <use xlink:href="#checkbox-30" class="checkbox"></use>
                                </svg>
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" style="display:none">
                                <symbol id="checkbox-30" viewBox="0 0 22 22">
                                    <path fill="none" stroke="currentColor"
                                        d="M5.5,11.3L9,14.8L20.2,3.3l0,0c-0.5-1-1.5-1.8-2.7-1.8h-13c-1.7,0-3,1.3-3,3v13c0,1.7,1.3,3,3,3h13 c1.7,0,3-1.3,3-3v-13c0-0.4-0.1-0.8-0.3-1.2" />
                                </symbol>
                            </svg>
                        </div>
                        {{-- © CSS Scan, #30 by Saeed Alipoor --}}
                        <label for="checkbox">Remember me</label>
                    </div>
                    <input type="submit" value="Log in ">
                </form>
            </div>
        </div>
    </x-slot:pageContent>
</x-page-layout>