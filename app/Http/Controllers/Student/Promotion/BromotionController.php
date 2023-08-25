<?php

namespace App\Http\Controllers\Student\Promotion;

use App\Http\Controllers\Controller;
use App\Http\Repositories\PromotionInterfac;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BromotionRequest;




class BromotionController extends Controller
{
    protected $obj_promotion;

    public function __construct(PromotionInterfac $promotion)
    {
        $this->obj_promotion = $promotion;
    }
    public function index()
    {
        return $this->obj_promotion->index();
    }


    public function create()
    {
        return $this->obj_promotion->create();
    }


    public function store(BromotionRequest $request)
    {

        return $this->obj_promotion->store_promotion($request);
    }




    public function destroy(Request $request)
    {
        return $this->obj_promotion->destroy_promotion($request);
    }
}
