<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;
use App\Models\Grade;
use Exception;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $grades =  Grade::get();
        return view('pages.Grades.Grades', compact('grades'));
    }
    // --------------------------------------------
    public function store_grades(StoreGradeRequest $request)
    {
        try {
            $this->store_grade($request);
            return redirect()->back()->with('message', 'Data added Successfully');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    // --------------------------------------------

    public function update(UpdateGradeRequest $request)
    {

        try {
            $this->update_grade($request);
            return redirect()->back()->with('message', 'Data updates Successfully');
        } catch (Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    // --------------------------------------------
    public function delete(Request $request)
    {
        try {

            Grade::find($request->id)->delete();
            return redirect()->back()->with('message', 'Data Deleted Successfully');
        } catch (Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    // --------------------------------------------
    private function store_grade($request)
    {

        Grade::create([

            'Name' => [

                'ar' => $request->Name_ar,
                'en' => $request->Name_en
            ],
            'Notes' => $request->Notes
        ]);
    }
    // --------------------------------------------
    private function update_grade($request)
    {

        Grade::find($request->id)->update([
            'Name' => [

                'ar' => $request->Name,
                'en' => $request->Name_en
            ],
            'Notes' => $request->Notes


        ]);
    }
}
