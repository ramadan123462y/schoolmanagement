<?php

namespace App\Http\Controllers\Teacher\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Attendance;
use App\Http\Requests\ReportAttendentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function show_students()
    {
        $students = $this->get_students();
        return view('pages.Teachers.dashboard.students.index', compact('students'));
    }
    private function get_students()
    {
        $teacherid = Auth::guard('teacher')->user()->id;
        $teacher = Teacher::find($teacherid)->with('sections.students')->first();
        $student = Student::wherein('section_id', $teacher->sections->pluck('id'));
        $students = $student->get();
        return $students;
    }


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
    public function update_attendance(Request $request)
    {

        Attendance::find($request->id)->update([
            'attendence_status' => $request->attendences
        ]);
        return redirect()->back()->with('message', 'Registering Attendance Suceesfully');
    }

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
    public function sections()
    {
        $teacherid = Auth::guard('teacher')->user()->id;
        $teacher = Teacher::find($teacherid)->with('sections')->first();
        $sections = $teacher->sections;
        return view('pages.Teachers.dashboard.Sections.index', compact('sections'));
    }

    public function report_attendance()
    {
        $students = $this->get_students();
        return view('pages.Teachers.dashboard.students.attentancereport', compact('students'));
    }
    public function report(ReportAttendentRequest $request)
    {

        if ($request->student_id == 0) {

            $Students = Attendance::whereBetween('attendence_date', [$request->from, $request->to])->get();
        } else {
            $Students =   Attendance::whereBetween('attendence_date', [$request->from, $request->to])->where('student_id', $request->student_id)->get();
        }

        $students = $this->get_students();
        return redirect('teacher/report_attendance')->with(compact('Students', 'students'));
    }
}
