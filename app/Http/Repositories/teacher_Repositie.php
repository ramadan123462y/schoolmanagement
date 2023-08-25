<?php

namespace App\Http\Repositories;

use App\Models\Gender;
use App\Models\Teacher;
use App\Models\Specialization;
use App\Http\Repositories\teacher_interface;
use Illuminate\Support\Facades\Hash;


class teacher_Repositie implements teacher_interface
{

    private function get_teacheres()
    {
        return  Teacher::get();
    }

    public function get_all_teacher()
    {
        $Teachers = $this->get_teacheres();
        return view('pages.Teachers.teacher', compact('Teachers'));
    }

    public function create()
    {
        $specializations = $this->get_Specialization();
        $genders = $this->get_genders();
        return view('pages.Teachers.create', compact('specializations', 'genders'));
    }
    private function get_Specialization()
    {

        return Specialization::get();
    }
    private function get_genders()
    {
        return Gender::get();
    }
    public function store_teacher($request)
    {
        try {
            $Teachers = new Teacher();
            $Teachers->Email = $request->Email;
            $Teachers->Password =  $request->Password;
            $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Teachers->Specialization_id = $request->Specialization_id;
            $Teachers->Gender_id = $request->Gender_id;
            $Teachers->Joining_Date = $request->Joining_Date;
            $Teachers->Address = $request->Address;
            $Teachers->save();


            return redirect('teacher')->with("message", "Data Updated Succfully");
        } catch (\Exception $e) {


            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function edit_teacher($id)
    {

        try {


            $specializations = $this->get_Specialization();
            $genders = $this->get_genders();
            $teacher = Teacher::find($id);
            return view('pages.Teachers.edit', compact('teacher', 'genders', 'specializations'));
        } catch (\Exception $e) {


            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function get_teacher_by_id($id)
    {

        return Teacher::find($id);
    }
    public function update_teacher($request)
    {
        try {


            Teacher::find($request->id)->update([

                'Email' => $request->Email,
                'Password' => $request->Password,
                'Name' => [

                    'ar' => $request->Name_ar,
                    'en' => $request->Name_en,
                ],
                'Specialization_id' => $request->Specialization_id,
                'Gender_id' => $request->Gender_id,
                'Joining_Date' => $request->Joining_Date,
                'Address' => $request->Address,

            ]);

            return redirect('teacher')->with("message", "Data Updated Succfully");
        } catch (\Exception $e) {


            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function delete_teacher($id)
    {
        try {


            Teacher::find($id)->delete();
            return redirect('teacher')->with("message", "Data Deleted Succfully");
        } catch (\Exception $e) {


            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
