<?php

namespace App\Http\Controllers\Auth;

use App\Enums\ActiveStatus;
use App\Enums\UserRole as EnumsUserRole;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


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
            'password' => ['required', 'confirmed', Rules\Password::min(8)],
            'phone' => 'required|digits:10',
            'birthday' =>'required|date_format:"Y-m-d"',
            'address' =>'required|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' =>$request->phone,
            'birthday' => $request->birthday,
            'address' => $request->address,
            
        ]);
        
        $role = Role::where('role_name',EnumsUserRole::ROLE_USER)->first();
        $user->roles()->attach($role->id);
        event(new Registered($user));

        //Auth::login($user);

        return redirect(RouteServiceProvider::LOGIN);
    }
}
