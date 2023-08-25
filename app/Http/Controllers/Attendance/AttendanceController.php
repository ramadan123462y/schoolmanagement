<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Grade;
use App\Models\Student;

class AttendanceController extends Controller
{

    public function index()
    {
        $teachers = Teacher::get();
        $list_Grades = Grade::with('sections')->get();
        return view('pages.Attendance.sections', compact('teachers', 'list_Grades'));
    }

    // -------------------------------------

    public function store(Request $request)
    {
        if (!empty($request->attendences)) {
            try {
                foreach ($request->attendences as $student_id => $status) {
                    $this->store_attendance($request, $student_id, $status);
                }
                return redirect()->back()->with('message', 'Registering Attendance Suceesfully');
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        } else {
            return redirect()->back()->withErrors(['error' => "Not Student Attendance Information"]);
        }
    }

    // -------------------------------------
    public function show($id)
    {
        $students = Student::where('section_id', $id)->get();
        return view('pages.Attendance.attendance', compact('students'));
    }
    // -------------------------------------
    private function store_attendance($request, $student_id, $status)
    {
        Attendance::create([
            'student_id' => $student_id,
            'section_id' => $request->section_id,
            'teacher_id' => 1,
            'classroom_id' => $request->classroom_id,
            'grade_id' => $request->grade_id,
            'attendence_date' => date('Y-m-d'),
            'attendence_status' => $status,
        ]);
    }
}
