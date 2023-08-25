<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Repositories\teacher_interface;
use App\Http\Controllers\Controller;
use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTecherRequest;
use App\Http\Requests\UpdateTecherRequest;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    protected $teacher_obj;
    public function __construct(teacher_interface $teacher_obj)
    {
        $this->teacher_obj = $teacher_obj;
    }

    public function get_all_teacher()
    {

        return $this->teacher_obj->get_all_teacher();
    }

    public function create()
    {
        return  $this->teacher_obj->create();
    }

    public function store(StoreTecherRequest $request)
    {


        // $Teachers = new Teacher();
        // $Teachers->Email = $request->Email;
        // $Teachers->Password =  $request->Password;
        // $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
        // $Teachers->Specialization_id = $request->Specialization_id;
        // $Teachers->Gender_id = $request->Gender_id;
        // $Teachers->Joining_Date = $request->Joining_Date;
        // $Teachers->Address = $request->Address;
        // $Teachers->save();
        // return redirect('teacher')->with('message', "data Aded Sucessfully");
      return  $this->teacher_obj->store_teacher($request);
    }
    public function edit($id)
    {
        return $this->teacher_obj->edit_teacher($id);
    }
    public function update(UpdateTecherRequest $request)
    {

        return  $this->teacher_obj->update_teacher($request);
    }
    public function delete(Request $request)
    {
        return $this->teacher_obj->delete_teacher($request->id);
    }
}
