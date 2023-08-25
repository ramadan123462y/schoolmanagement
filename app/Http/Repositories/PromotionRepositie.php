<?php

namespace App\Http\Repositories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Support\Facades\DB;


class PromotionRepositie implements PromotionInterfac
{

    public function index()
    {
        $Grades = $this->get_grades();
        return view('pages.Students.Promotions.make_promotion', compact('Grades'));
    }


    public function create()
    {
        $promotions = $this->get_promotion();

        return view('pages.Students.Promotions.promotion', compact('promotions'));
    }

    private function get_grades()
    {

        return  Grade::get();
    }
    private function get_promotion()
    {

        return  Promotion::get();
    }
    public function store_promotion($request)
    {

        DB::beginTransaction();
        try {
            $students = $this->get_student_to_promotion($request);
            if ($students->count() < 1) {

                return redirect()->back()->withErrors(['error' => "Not Found Students Same Information "]);
            } else {
                foreach ($students as $student) {
                    $this->update_student_pormotion($request, $student);
                    $this->Insert_promotion($request, $student);
                }
            }
            DB::commit();
            return redirect()->back()->with('message', 'Students Promotion Suceesfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function destroy_promotion($request)
    {

        DB::beginTransaction();
        try {
            if ($request->page_id == 1) {
                //----------update promotion-----------------
                $promotions = Promotion::get();
                $this->update_role_back($promotions);
                //----------Delete promotion-----------------
                Promotion::truncate();
                return redirect()->back()->with('message', "Role Back Promotion Students Successfully");
            } else {
                //----------update promotion-----------------
                $promotion =  Promotion::find($request->id);

                $this->upadate_role_back_one($promotion);
                //----------Delete promotion-----------------
                $promotion->truncate();
                return redirect()->back()->with('message', "Role Back Promotion Student Successfully");
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    private function Insert_promotion($request, $student)
    {

        Promotion::updateOrCreate([


            'student_id' => $student->id,
            'from_grade' => $request->Grade_id,
            'from_Classroom' => $request->Classroom_id,
            'from_section' => $request->section_id,
            'to_grade' => $request->Grade_id_new,
            'to_Classroom' => $request->Classroom_id_new,
            'to_section' => $request->section_id_new,
            'academic_year' => $request->academic_year,
            'academic_year_new' => $request->academic_year_new,


        ]);
    }

    private function get_student_to_promotion($request)
    {

        $students =   Student::where('grade_id', $request->Grade_id)
            ->where('classroom_id', $request->Classroom_id)->where('section_id', $request->section_id)
            ->where('academic_year', $request->academic_year)->get();
        return $students;
    }
    private function update_student_pormotion($request, $student)
    {


        $student->update([

            'grade_id' => $request->Grade_id_new,
            'classroom_id' => $request->Classroom_id_new,
            'section_id' => $request->section_id_new,
            'academic_year' => $request->academic_year_new,

        ]);
    }
    private  function update_role_back($promotions)
    {
        foreach ($promotions as $promotion) {
            $promotion->student->update([

                'grade_id' => $promotion->from_grade,
                'classroom_id' => $promotion->from_Classroom,
                'section_id' => $promotion->from_section,
                'academic_year' => $promotion->academic_year,

            ]);
        }
    }
    private function upadate_role_back_one($promotion)
    {

        $promotion->student->update([

            'grade_id' => $promotion->from_grade,
            'classroom_id' => $promotion->from_Classroom,
            'section_id' => $promotion->from_section,
            'academic_year' => $promotion->academic_year,

        ]);
    }
}
