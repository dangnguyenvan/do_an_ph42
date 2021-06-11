<?php

namespace App\Http\Controllers\Auth;

use App\Enums\ActiveStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
           //todo
           //get email in db
           //if exxi
        $email = User::where('email',$request->email)->first();
        $status = $email->status;
        if ($status != ActiveStatus::ACTIVE) {

            return redirect()->route('login')->with('mess','Your account has been locked, please contact the administrator (Gmail:admin.info@gmail.com)');
        }
        $request->authenticate();

        $request->session()->regenerate();

        //dd(Auth::user()->email);
        // if (Auth::user()->email == "dangnguyenvan.info@gmail.com"){
        //     $a =Auth::user()->roles;
        //     foreach ($a as $key => $value) {
        //        $rolename = $value->role_name;
        //     }
        //     dd($rolename);
        //     dd("admin");
        //     return redirect()->intended(RouteServiceProvider::ADMIN);
        // }else{
        //     dd("customer");
            
        // }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
