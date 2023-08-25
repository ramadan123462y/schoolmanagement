<?php

namespace App\Http\Repositories;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateSectionRequest;
use App\Models\Teacher;

class SectionRepositie implements Section_interface
{
    public function index()
    {

        $teachers = Teacher::get();
        $list_Grades = Grade::with('sections')->get();
        return view('pages.Sections.section', compact('list_Grades', 'teachers'));
    }
    // --------------------------------------------
    public function getClasses($grade_id)
    {
        $classes = Classroom::where('grade_id', $grade_id)->pluck('Name_Class', 'id');
        return response()->json($classes);
    }
    // --------------------------------------------
    public function store($request)
    {

        try {
            $status = $this->get_status($request);
            $section = $this->store_section($request, $status);
            $section = Section::latest()->first();
            $section->teachers()->attach($request->teacher_id);

            return redirect()->back()->with('message', "Data Add Successfully");
        } catch (\Exception $e) {


            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    // --------------------------------------------

    public function update($request)
    {


        try {
            $status = $this->get_status($request);
            $this->update_section($request, $status);
            $Section = $this->get_sectionby_id($request);
            if (isset($request->teacher_id)) {
                $Section->teachers()->sync($request->teacher_id);
            } else {
                $Section->teachers()->sync(array());
            }
            return redirect()->back()->with('message', "Data Updated Successfully");
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    // --------------------------------------------

    public function delete($request)
    {
        try {

            Section::find($request->id)->delete();
            return redirect()->back()->with('message', 'Data Deleted Successfully');
        } catch (\Exception $e) {


            return redirect()->back()->withErrors(['error' => "can not deleted because data attached"]);
        }
    }
    // --------------------------------------------
    private function store_section($request, $status)
    {

        $section =    Section::create([

            'Name_Section' => [

                'ar' => $request->Name_Section_Ar,
                'en' => $request->Name_Section_En
            ],
            'Status' => $status,


            'classroom_id' => $request->Class_id,
            'grade_id' => $request->Grade_id,

        ]);
        return $section;
    }
    private function update_section($request, $status)
    {
        Section::find($request->id)->update([

            'Name_Section' => [

                'ar' => $request->Name_Section_Ar,
                'en' => $request->Name_Section_En
            ],
            'Status' => $status,
            'classroom_id' => $request->Class_id,
            'grade_id' => $request->Grade_id,
        ]);
    }
    private function get_status($request)
    {
        $status = 0;

        if (isset($request->Status)) {
            return   $status = 1;
        } else {
            return  $status = 0;
        }
    }

    private function get_sectionby_id($request)
    {

        return   Section::find($request->id);
    }
}
