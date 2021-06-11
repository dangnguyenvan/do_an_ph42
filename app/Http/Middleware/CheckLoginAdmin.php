<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()==null) {
            
            return redirect()->route('login');
        }else{
            $roles = Auth::user()->roles;
            //dd($roles);
            foreach($roles as $key => $role){
                $role_name = $role->role_name;
                //dd($role_name);
                if ($role->role_name == UserRole::ROLE_ADMIN) {
                    return $next($request);
                      
                }
            }

            return redirect()->route('dashboard');
        }
        //return $next($request);
    }
}
