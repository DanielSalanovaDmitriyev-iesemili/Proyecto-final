<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $stripe = new \Stripe\StripeClient('sk_test_51InU3DLE2gDi5g6C6KyJPreWUxEXJmxV90HasKdqgiNo9vrk8TKPmWU3U1x3tBkjeIKCUTJ4zr7Tyq2VR0mS7ewf0031YKoyoq');

         $customer = $stripe->customers->create([
            'name' => $request->name,
            'email' => $request->email,
            'description' => 'Usuario Plataforma de Compra',
          ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'stripe_id' => $customer->id,
            'password' => Hash::make($request->password),
        ]);


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
