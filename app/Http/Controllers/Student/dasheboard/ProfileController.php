<?php

namespace App\Http\Controllers\Student\dasheboard;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Traits\FilemanagementTrait;
use App\Models\Librarry;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use FilemanagementTrait;


    public function index()
    {
        $information = Auth::guard('student')->user();
        return view('pages.Students.dashboard.profile', compact('information'));
    }
    //____________profile___________________

    // ________________Upadate_profile______________
    public function update(Request $request)
    {

        $request->validate([
            'Name_ar' => 'required',
            'Name_en' => 'required',


        ]);
        if (!empty($request->password)) {

            Student::find(Auth::guard('student')->user()->id)->update([
                'name' => [

                    'ar' => $request->Name_ar,
                    'en' => $request->Name_en,
                ],

                'password' =>Hash::make($request->password),
            ]);
        } else {
            Student::find(Auth::guard('student')->user()->id)->update([
                'name' => [

                    'ar' => $request->Name_ar,
                    'en' => $request->Name_en,
                ],
            ]);
        }
        return redirect()->back()->with('message', "Profile Updated Sucessfully");
    }

    // ------------subject blde----------------
    public function index_subjects()
    {

        $student = Auth::guard('student')->user();
        $subjects =  Subject::where('grade_id', $student->grade_id)->where('classroom_id', $student->classroom_id)->get();
        return view('pages.Students.dashboard.subjects', compact('subjects'));
    }
    // --------------books blade-----------------
    public function book()
    {
        $books =  Librarry::paginate(3);
        return view('pages.Students.dashboard.books', compact('books'));
    }
    public function download_file($filename)
    {

        return  $this->download_filetrait('Books', $filename);
    }
}
