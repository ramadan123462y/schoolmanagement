<?php

namespace App\Http\Services;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\AuthTrait;
use App\Models\My_Parent;
use App\Models\Teacher;
use App\Models\User;

class LogineService
{

    public function logine_student($request)
    {

        if (Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return  redirect(RouteServiceProvider::STUDENT);
        } else {
            return redirect()->back()->withErrors(['error' => "Data Not Corrected....!"]);
        }
    }
    public function Logine_parent($request)
    {

        $parent1 = DB::table('my__parents')->where('Email', $request->email)->where('Password', $request->password)->first();
        $parent =  My_Parent::find($parent1->id);
        if ($parent) {
            Auth::guard('parent')->login($parent);
            return  redirect(RouteServiceProvider::PARENT);
        } else {

            return redirect()->back()->withErrors(['error' => "Data Not Corrected....!"]);
        }
    }
    public function logine_teacher($request)
    {

        $teacher = Teacher::where('Email', $request->email)->where('Password', $request->password)->first();
        if ($teacher) {
            Auth::guard('teacher')->login($teacher);
            return  redirect(RouteServiceProvider::TEACHER);
        } else {

            return redirect()->back()->withErrors(['error' => "Data Not Corrected....!"]);
        }
    }
    public function logine_admin($request)
    {

        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return  redirect(RouteServiceProvider::ADMIN);
        } else {
            return redirect()->back()->withErrors(['error' => "Data Not Corrected....!"]);
        }
    }
}
