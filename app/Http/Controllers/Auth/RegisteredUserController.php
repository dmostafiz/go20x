<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function create(Request $request)
    {

        if(!$request->uname){
            return redirect()->to('/join/master');
        }
        return Inertia::render('Auth/Register', [
            'sponsor_id'=> $request->uname
        ]);
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
            'sponsor_id' => 'required',
            'username' => 'required|string|max:255|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'country' => 'required|string',
            'phone_number' => 'required|string'
        ]);

        // dd($request->username);

        $preAdmin = User::where('user_type', 'admin')->first();

        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'country' => $request->country,
            'phone_number' => $request->phone_number,
        ]);

        $sponsorUser = User::where('username', $request->sponsor_id)->first();

        if($sponsorUser){
            $user->parent_id = $sponsorUser->id;
            $user->save();
        }

        if(!$preAdmin){
            $user->user_type = 'admin';
            $user->save();
        }

        event(new Registered($user));

        Auth::login($user);

        return Inertia::location(RouteServiceProvider::HOME);

    }
}
