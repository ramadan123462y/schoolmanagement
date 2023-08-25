<?php

namespace App\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Requests\SubjectRequest;

class SubjectController extends Controller
{

    public function index()
    {
        $subjects = Subject::all();
        return view('pages.Subject.index', compact('subjects'));
    }


    public function create()
    {
        $grades = Grade::all();
        $teachers = Teacher::all();
        return view('pages.Subject.create', compact('grades', 'teachers'));
    }


    public function store(SubjectRequest $request)
    {
        try {
            Subject::create([
                'name' => [
                    "ar" => $request->Name_ar,
                    "en" => $request->Name_en,
                ],
                'grade_id' => $request->Grade_id,
                'classroom_id' => $request->Class_id,
                'teacher_id' => $request->teacher_id,
            ]);
            return redirect('subject')->with('message', 'Data Aded Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function edit($id)
    {
        $data['grades'] = Grade::all();
        $data['teachers'] = Teacher::all();
        $data['subject'] = Subject::find($id);
        return view('pages.Subject.edit', $data);
    }
    public function update(SubjectRequest $request)
    {
        try {
            Subject::find($request->id)->update([
                'name' => [
                    "ar" => $request->Name_ar,
                    "en" => $request->Name_en,
                ],
                'grade_id' => $request->Grade_id,
                'classroom_id' => $request->Class_id,
                'teacher_id' => $request->teacher_id,
            ]);
            return redirect('subject')->with('message', 'Data Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
        try {
            Subject::find($request->id)->delete();
            return redirect('subject')->with('message', 'Data Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
