<?php

namespace App\Http\Controllers\Teacher\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;

class ProfileTeacherController extends Controller
{
    public function index()
    {
        $information = Teacher::find(Auth::guard('teacher')->user()->id);
        return view('pages.Teachers.dashboard.profile', compact('information'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'Name_ar' => 'required',
            'Name_en' => 'required',
        ]);

        Teacher::find(Auth::guard('teacher')->user()->id)->update([

            'Password' => $request->password,
            'Name' => [

                'ar' => $request->Name_ar,
                'en' => $request->Name_en
            ]

        ]);
        return redirect()->back()->with('message', 'profile Updated');
    }
}
