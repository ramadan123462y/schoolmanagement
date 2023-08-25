<?php

namespace App\Http\Controllers\Teacher\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{


    public function index()
    {
        $teacherid = Auth::guard('teacher')->user()->id;
        $teacher = Teacher::find($teacherid)->with('sections.students')->first();
        $student = Student::wherein('section_id', $teacher->sections->pluck('id'));
        $data['studentscount'] = $student->count();
        $data['sectioncount'] = $teacher->sections()->count();
        return view('pages.Teachers.dashboard.dashboard', $data);
    }

}
