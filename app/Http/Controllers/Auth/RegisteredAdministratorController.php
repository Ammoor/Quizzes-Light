<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Administrator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredAdministratorController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.registration-page-admin');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first-name' => ['required', 'string', 'max:255'],
            'last-name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Administrator::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $administrator = Administrator::create([
            'first_name' => $request->input('first-name'),
            'last_name' => $request->input('last-name'),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'quizzes' => json_encode([]),
        ]);

        event(new Registered($administrator));

        Auth::guard('administrator')->login($administrator);

        Auth::login($administrator);

        return redirect(route('admin-dashboard-home', absolute: false));
    }
}
