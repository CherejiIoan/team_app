<?php

namespace App\Http\Controllers\Auth;
use App\Models\Role;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeUser;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'telefon' => ['required', 'numeric', 'digits_between:9,12'],
            'zi_de_nastere' => ['required', 'date', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            
        ]);

        $zi_de_nastere = date('Y-m-d', strtotime($request->zi_de_nastere));

// dd($zi_de_nastere);

        $user = User::create([
            'name' => $request->name,
            'telefon' => $request->telefon,
            'zi_de_nastere' => $zi_de_nastere,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 2,
        ]);

        event(new Registered($user));

    Auth::login($user);

    // Atribuie automat rolul "user" utilizatorului nou creat
    $user->role()->associate(Role::where('name', 'user')->first());

    // Trimite emailul de bun venit
    Mail::to($user->email)->send(new WelcomeUser($user));
        return redirect(RouteServiceProvider::HOME);
    }
}
