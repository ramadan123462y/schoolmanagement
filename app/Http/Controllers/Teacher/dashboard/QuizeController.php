<?php

namespace App\Http\Controllers\Teacher\dashboard;

use App\Models\Grade;
use App\Models\Quize;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Requests\QuizeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Classroom;
use App\Models\Section;

class QuizeController extends Controller
{


    public function index()
    {
        $quizzes = Teacher::find(Auth::guard('teacher')->user()->id)->quizes;
        return view('pages.Teachers.dashboard.Quizes.index', compact('quizzes'));
    }

    public function create()
    {
        $subjects = Subject::all();
        $grades = Grade::all();
        $teacher_id = Auth::guard('teacher')->user()->id;
        $teacher =  Teacher::find($teacher_id)->select('id', 'Name')->first();

        return view('pages.Teachers.dashboard.Quizes.create', compact('subjects', 'grades', 'teacher'));
    }

    public function ajax_get_classroom($grade_id)
    {
        $classromes = Classroom::where('grade_id', $grade_id)->pluck('id', 'Name_Class');

        return json_encode($classromes);
    }
    public function ajax_get_sections($classroom_id)
    {

        $sections = Section::where('classroom_id', $classroom_id)->pluck('id', 'Name_Section');
        return json_encode($sections);
    }


    public function store(QuizeRequest $request)
    {
        Quize::create([
            'name' => [
                'ar' => $request->Name_ar,
                'en' => $request->Name_en,
            ],
            'subject_id' => $request->subject_id,
            'teacher_id' => $request->teacher_id,
            'grade_id' => $request->Grade_id,
            'classroom_id' => $request->Classroom_id,
            'section_id' => $request->section_id,
        ]);
        return redirect('teacher/Quize')->with('message', "Data Aded Successfully");
    }

    public function show($id)
    {
        $quize = Quize::find($id);
        $questions = $quize->questions;
        return view('pages.Teachers.dashboard.Questions.index', compact('questions', 'quize'));
    }

    public function edit($id)
    {
        $data['quizz'] = Quize::find($id);
        $data['subjects'] = Subject::all();
        $data['grades'] = Grade::all();
        $data['teacher_id'] = Auth::guard('teacher')->user()->id;
        return view('pages.Teachers.dashboard.Quizes.edit', $data);
    }

    public function update(QuizeRequest $request)
    {
        Quize::find($request->id)->update([
            'name' => [
                'ar' => $request->Name_ar,
                'en' => $request->Name_en,
            ],
            'subject_id' => $request->subject_id,
            'teacher_id' => $request->teacher_id,
            'grade_id' => $request->Grade_id,
            'classroom_id' => $request->Classroom_id,
            'section_id' => $request->section_id,

        ]);
        return redirect('teacher/Quize')->with('message', "Data Updated Successfully");
    }


    public function destroy(Request $request)
    {
        Quize::find($request->id)->delete();
        return redirect('teacher/Quize')->with('message', "Data Updated Successfully");
    }
}
