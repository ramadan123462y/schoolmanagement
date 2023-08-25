<?php


namespace App\Http\Repositories;

use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;
use App\http\Repositories\GraduateInterface;

class GraduateRepositie implements GraduateInterface
{
    private function get_trashed_students()
    {
        return  Student::onlyTrashed()->get();
    }
    private function get_grades()
    {

        return  Grade::get();
    }
    public function index()
    {
        $students = $this->get_trashed_students();
        return view('pages.Students.Graduates.graduate', compact('students'));
    }


    public function create()
    {
        $Grades = $this->get_grades();
        return view('pages.Students.Graduates.create', compact('Grades'));
    }


    public function soft_delete_students($request)
    {


        try {
            $students = $this->get_student_to_graduate($request);
            if ($students->count() == 0) {
                return redirect()->back()->withErrors(['error' => "Not Find Students "]);
            } else {
                $this->delete_students($students);
                return redirect()->back()->with('message', 'Studentes Graduests Successfully');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function restore_students($request)
    {


        try {
            Student::onlyTrashed()->find($request->id)->restore();
            return redirect()->back()->with('message', 'Studentes Returned  Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy_students($request)
    {

        try {
            Student::onlyTrashed()->find($request->id)->forceDelete();

            return redirect()->back()->with('message', 'Studentes Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    private function get_student_to_graduate($request)
    {
        $students = Student::where('grade_id', $request->Grade_id)
            ->where('classroom_id', $request->Classroom_id)->where('section_id', $request->section_id)
            ->get();
        return $students;
    }


    private function delete_students($students)
    {
        foreach ($students as $student) {
            $student->delete();
        }
    }
}
