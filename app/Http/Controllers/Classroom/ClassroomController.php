<?php

namespace App\Http\Controllers\Classroom;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Grade;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClassRequest;
use App\Http\Requests\UpdateClassRequest;

class ClassroomController extends Controller
{
    public function index()
    {
        $Classesrooms = $this->get_all_classroom();
        $Grades = Grade::get();
        return view('pages.Classes.classes', compact('Grades', 'Classesrooms'));
    }
    // --------------------------------------------
    public function store_classes(StoreClassRequest $request)
    {
        $listclasses = $request->List_Classes;
        try {

            foreach ($listclasses as $listclasse) {

                $this->store_class($listclasse);
            }
            return redirect()->back()->with('message', 'Data Adedd Sucessfully');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    // --------------------------------------------

    public function update(UpdateClassRequest $request)
    {
        try {
            $this->update_class($request);
            return redirect()->back()->with('message', 'Data Updated Sucessfully');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    // --------------------------------------------


    public function delete(Request $request)
    {
        try {

            Classroom::find($request->id)->delete();
            return redirect()->back()->with('message', 'Data Deleted Sucessfully');
        } catch (Exception $e) {


            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    // --------------------------------------------

    public function delete_all(Request $request)
    {
        try {

            $ids = $this->explode_id($request);
            $this->delete_Alll($ids);
            return redirect()->back()->with('message', 'Data Deleted Sucessfully');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    // --------------------------------------------

    public function filter_with_Grade_id(Request $request)
    {
        $Grades = $this->get_all_grade();
        $Classesrooms = $this->find_class_filter($request);
        return redirect()->back()->with(compact('Grades', 'Classesrooms'));
    }

    // ------------------------------------------------
    private function get_all_grade()
    {
        return Grade::get();
    }

    private function find_class_filter($request)
    {
        return  Classroom::where('grade_id', $request->Grade_id)->get();
    }
    private function get_all_classroom()
    {

        return Classroom::get();
    }
    private function store_class($listclasse)
    {
        Classroom::create([


            'Name_Class' => [

                'ar' => $listclasse['Name'],
                'en' => $listclasse['Name_class_en'],

            ],
            'grade_id' => $listclasse['Grade_id']
        ]);
    }
    private function update_class($request)
    {

        Classroom::find($request->id)->update([

            'Name_Class' => [

                'ar' => $request->Name,
                'en' => $request->Name_en,
            ],
            'grade_id' => $request->Grade_id,
        ]);
    }
    private function explode_id($request)
    {

        return  $ids = explode(',', $request->delete_all_id);
    }
    private function delete_Alll($ids)
    {
        Classroom::wherein('id', $ids)->delete();
    }
}
