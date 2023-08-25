<?php

namespace App\Http\Controllers\Student\Graduates;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Repositories\GraduateInterface;

class GraduateController extends Controller
{
    protected $obj_graduate;
    public function __construct(GraduateInterface $graduate)
    {
        $this->obj_graduate = $graduate;
    }

    public function index()
    {
        return $this->obj_graduate->index();
    }
    public function create()
    {

        return $this->obj_graduate->create();
    }

    public function soft_delete(Request $request)
    {
        return $this->obj_graduate->soft_delete_students($request);
    }
    public function update(Request $request)
    {
        return $this->obj_graduate->restore_students($request);
    }
    public function destroy(Request $request)
    {
        return $this->obj_graduate->destroy_students($request);
    }
}
