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
            'mobile' => 'required|string',
            'location' => 'required|string',
            'gender' => 'required|string',
            'user' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobile' => ($request->mobile),
            'location' => ($request->location),
            'gender' => ($request->gender),
        ]);

        if ($request->user == 'hoster') {
            $user->assignRole('hoster');
        } elseif ($request->user == 'user') {
            $user->assignRole('user');
        }

        event(new Registered($user));

        Auth::login($user);

        if ($user->hasRole('admin')) {

            return redirect(route('admin.dashboard'));
        } elseif ($user->hasRole('user')) {

            return redirect(route('user.dashboard'));
        } elseif ($user->hasRole('hoster')) {

            return redirect(route('hoster.dashboard'));
        }
    }
}
