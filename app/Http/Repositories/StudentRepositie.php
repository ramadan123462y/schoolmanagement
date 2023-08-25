<?php


namespace App\Http\Repositories;

use App\Models\Blood;
use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\image;
use Illuminate\Support\Facades\Hash;
use App\Models\My_Parent;
use App\Models\Nationalitie;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentRepositie implements student_interface
{
    private function get_student_by_id($id)
    {

        return  Student::find($id);
    }

    public function index()
    {
        $students = $this->get_students();
        return view('pages.Students.students', compact('students'));
    }
    private function get_students()
    {

        return   Student::get();
    }
    private function get_data()
    {
        $data['grades'] = Grade::all();
        $data['parents'] = My_Parent::all();
        $data['Genders'] = Gender::all();
        $data['nationals'] = Nationalitie::all();
        $data['bloods'] = Blood::all();
        return $data;
    }

    public function create()
    {


        $data =  $this->get_data();
        return view('pages.Students.student_add', $data);
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
    public function store($request)
    {
        try {


            // DB::beginTransaction();

            $student =  Student::create([
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'gender_id' => $request->gender_id,
                'nationalitie_id' => $request->nationalitie_id,
                'blood_id' => $request->blood_id,
                'Date_Birth' => $request->Date_Birth,
                'grade_id' => $request->Grade_id,
                'classroom_id' => $request->Classroom_id,
                'section_id' => $request->section_id,
                'parent_id' => $request->parent_id,
                'academic_year' => $request->academic_year,

            ]);


            $this->save_image($request, $student);
            // DB::commit();
            return redirect('student')->with('message', "Data Add Successfully! ");
        } catch (\Exception $e) {
            // DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function edit($id)
    {
        $data = $this->get_data();

        $data['student'] = $this->get_student_by_id($id);
        return view('pages.Students.students_edit', $data);
    }

    public function update($request)
    {
        try {



            Student::find($request->id)->update([
                'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'gender_id' => $request->gender_id,
                'nationalitie_id' => $request->nationalitie_id,
                'blood_id' => $request->blood_id,
                'Date_Birth' => $request->Date_Birth,
                'grade_id' => $request->Grade_id,
                'classroom_id' => $request->Classroom_id,
                'section_id' => $request->section_id,
                'parent_id' => $request->parent_id,
                'academic_year' => $request->academic_year,

            ]);
            return redirect('student')->with('message', "Data Updated Successfully! ");
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function delete($request)
    {



        $student = Student::findorfail($request->id_model);


        $student->images()->delete();
        $student->delete();


        $path = "Student_attachement/" . $student->id;
        $folderPath = public_path($path);

        // delete all files inside the folder
        foreach (glob($folderPath . '/*') as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }

        // delete the folder
        if (is_dir($folderPath)) {
            rmdir($folderPath);
            return redirect()->back()->with('message', " Data && Folder Images Deleted Successfully! ");
        } else {
            return redirect()->back()->withErrors(['error' => "Folder not exist"]);
        }
    }


    private function message_catch($e)
    {

        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    public function show_student($id)
    {

        $Student =  $this->get_student_by_id($id);
        return view('pages.Students.show_student', compact('Student'));
    }


    private function save_image($request, $student)
    {
        try {


            if (!empty($request->file('images'))) {


                foreach ($request->file('images') as $image) {

                    $image->storeAs('Student_attachement/' . $student->id, $image->getClientOriginalName(), 'upload_attachments');
                    image::create([

                        'filename' => $image->getClientOriginalName(),
                        'imageable_id' => $student->id,
                        'imageable_type' => 'App\Models\Student'
                    ]);
                }
            }
        } catch (\Exception $e) {


            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function uploade_new_image($request)
    {
        try {


            if (!empty($request->file('images'))) {

                foreach ($request->file('images') as $image) {

                    $image->storeAs('Student_attachement/' . $request->student_id, $image->getClientOriginalName(), 'upload_attachments');
                    image::create([

                        'filename' => $image->getClientOriginalName(),
                        'imageable_id' => $request->student_id,
                        'imageable_type' => 'App\Models\Student'
                    ]);
                }
            }
            return redirect()->back()->with('message', 'Images Updated  Successfully');
        } catch (\Exception $e) {


            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function Download_image($student_id, $student_image)
    {

        $path = public_path("Student_attachement/" . $student_id . "/" . $student_image);
        return response()->download($path);
    }
    public function delete_image($id_image, $student_id, $student_image)
    {
        try {




            image::find($id_image)->delete();
            $path = public_path("Student_attachement/" . $student_id . "/" . $student_image);
            if (file_exists($path)) {

                unlink($path);
                return redirect()->back()->with('message', 'Images Deleted  Successfully');
            } else {

                return redirect()->back()->withErrors(['error' => "image not exist in folder"]);
            }
        } catch (\Exception $e) {


            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
