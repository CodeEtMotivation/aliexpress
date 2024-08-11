<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Parrainage;
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

    public function create2(string $referral_code): View
    {
        return view('auth.register2',[
            'referral_code' => $referral_code
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store2(Request $request): RedirectResponse
    {

    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'string', 'regex:/^\d{9}$/'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'state' => ['required'],
            'referral_code' => 'nullable|string|exists:users,referral_code',
        ]);

        $user = User::create([
            'name' => $request->name,
            'tel' => $request->tel,
            'password' => Hash::make($request->password),
            'state' => $request->state,
        ]);

        

        event(new Registered($user));

        // Gestion du parrainage
        if ($request->filled('referral_code')) {
            $parrain = User::where('referral_code', $request->referral_code)->first();

            if ($parrain) {
                Parrainage::create([
                    'parrain_id' => $parrain->id,
                    'parraine_id' => $user->id,
                ]);
            }
        }

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
