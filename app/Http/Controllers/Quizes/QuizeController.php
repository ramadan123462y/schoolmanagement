<?php

namespace App\Http\Controllers\Quizes;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Quize;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Requests\QuizeRequest;

class QuizeController extends Controller
{
    public function index()
    {
        $quizzes = Quize::all();
        return view('pages.Quizes.index', compact('quizzes'));
    }
// ----------------------------------------------
    public function create()
    {
        $subjects = Subject::all();
        $teachers = Teacher::all();
        $grades = Grade::all();
        return view('pages.Quizes.create', compact('subjects', 'teachers', 'grades'));
    }
// ----------------------------------------------
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
        return redirect('quize')->with('message', "Data Aded Successfully");
    }
// ----------------------------------------------
    public function edit($id)
    {
        $data['quizz'] = Quize::find($id);
        $data['subjects'] = Subject::all();
        $data['teachers'] = Teacher::all();
        $data['grades'] = Grade::all();
        return view('pages.Quizes.edit', $data);
    }
// ----------------------------------------------
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
        return redirect('quize')->with('message', "Data Updated Successfully");
    }
// ----------------------------------------------
    public function destroy(Request $request)
    {
        Quize::find($request->id)->delete();
        return redirect('quize')->with('message', "Data Updated Successfully");
    }
}
