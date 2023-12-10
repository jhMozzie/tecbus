<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

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

        // dd($request);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'], // Campo LastName
            'dni' => ['required', 'string', 'max:255'], // Campo LastName
            'email' => ['required', 'string', 'lowercase', 'string', 'max:255', 'unique:' . User::class],
            'phone' => ['required', 'string', 'max:255'], // Campo Phone
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $emailTecsup = $request->input('email') . '@tecsup.edu.pe';


        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $emailTecsup,
            'dni' => $request->dni,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'user_type_id' => 1,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
