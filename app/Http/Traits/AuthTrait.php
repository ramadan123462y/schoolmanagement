<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Auth;

use App\Providers\RouteServiceProvider;
trait AuthTrait{


    public function check_auth($request,$guard){

        if (Auth::guard($guard)->attempt(['email' => $request->email, 'password' => $request->password])) {
            return  redirect( RouteServiceProvider::STUDENT);
        } else {
            return redirect()->back()->withErrors(['error' => "Data Not Corrected....!"]);
        }
    }
    public function current_guard(){

        if (Auth::guard('student')->check()) {
            $guard = 'student';
        } elseif (Auth::guard('parent')->check()) {
            $guard = 'parent';
        } elseif (Auth::guard('teacher')->check()) {

            $guard = 'teacher';
        } else {

            $guard = 'web';
        }
        return $guard;
    }
}
