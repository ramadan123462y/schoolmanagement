<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Student_interface;
use App\Models\Blood;
use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use Illuminate\Support\Facades\Hash;
use App\Models\My_Parent;
use App\Models\Nationalitie;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Models\image;

class StudentController extends Controller
{
    protected $obj_student;
    public function __construct(Student_interface $obj_student)
    {
        return $this->obj_student = $obj_student;
    }

    public function index()
    {
        return $this->obj_student->index();
    }
    public function create()
    {
        return $this->obj_student->create();
    }
    public function ajax_get_classroom($grade_id)
    {
        return $this->obj_student->ajax_get_classroom($grade_id);
    }
    public function ajax_get_sections($classroom_id)
    {
        return $this->obj_student->ajax_get_sections($classroom_id);
    }
    public function store(StudentRequest $request)
    {
        return $this->obj_student->store($request);
    }
    public function edit($id)
    {
        return $this->obj_student->edit($id);
    }
    public function update(Request $request)
    {
        return $this->obj_student->update($request);
    }
    public function delete(Request $request)
    {
        return $this->obj_student->delete($request);
    }

    public function show_student($id)
    {

        return $this->obj_student->show_student($id);
    }
    public function uploade_new_image(Request $request)
    {
        return $this->obj_student->uploade_new_image($request);
    }
    public function Download_image($student_id, $student_image)
    {
        return $this->obj_student->Download_image($student_id, $student_image);
    }
    public function delete_image($id_image, $student_id, $student_image)
    {
        return  $this->obj_student->delete_image($id_image, $student_id, $student_image);
    }
}
