<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Section_interface;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateSectionRequest;
use App\Models\Teacher;

class SectionController extends Controller
{
    protected $obj_section;
    public function __construct(Section_interface $obj_section)
    {
        $this->obj_section = $obj_section;
    }
    public function index()
    {

        return $this->obj_section->index();
    }

    public function getClasses($grade_id)
    {
        return $this->obj_section->getClasses($grade_id);
    }
    public function store(UpdateSectionRequest $request)
    {

        return  $this->obj_section->store($request);
    }

    public function update(UpdateSectionRequest $request)
    {


        return $this->obj_section->update($request);
    }

    public function delete(Request $request)
    {
        return  $this->obj_section->delete($request);
    }
}
