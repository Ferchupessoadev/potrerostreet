<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterFormRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        if (!config()->has("services.{$provider}")) {
            abort(404);
        }
        return Socialite::driver($provider)->redirect();
    }


    public function handleProviderCallback($provider) {
        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['msg' => 'No pudimos autenticarte con ' . $provider]);
        }

        $user = User::where($provider . '_id', $socialUser->getId())->first();

        if (!$user) {
            $user = User::where('email', $socialUser->getEmail())->first();

            if ($user) {
                $user->update([
                    $provider . '_id' => $socialUser->getId(),
                    'avatar' => $user->avatar ?? $socialUser->getAvatar(),
                ]);
            } else {
                $user = User::create([
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'password' => Hash::make(uniqid()),
                    'avatar' => $socialUser->getAvatar(),
                    $provider . '_id' => $socialUser->getId(),
                ]);
                $user->markEmailAsVerified();
                event(new Registered($user));
            }
        }

        Auth::login($user);
        return redirect()->intended('/dashboard');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['email' => 'Las credenciales no coinciden.']);
    }

    public function register(RegisterFormRequest $request)
    {
        $user = User::create($request->validated());

        event(new Registered($user));

        Auth::login($user);

        return redirect('/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect(route('home'));
    }

}
