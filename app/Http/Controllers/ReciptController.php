<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ReciptInterface;
use App\Models\FundAccount;
use App\Models\ReceiptStudent;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ReciptRequest;

class ReciptController extends Controller
{
    protected $obj_recipt;
    public function __construct(ReciptInterface $recipt)
    {
        $this->obj_recipt = $recipt;
    }
    public function index()
    {
        return $this->obj_recipt->index();
    }
    public function store(ReciptRequest $request)
    {

        return $this->obj_recipt->store($request);
    }
    public function show(string $id)
    {
        return $this->obj_recipt->show($id);
    }
    public function edit($id)
    {
        return $this->obj_recipt->edit($id);
    }
    public function update(ReciptRequest $request)
    {

        return  $this->obj_recipt->update($request);
    }
    public function destroy(Request $request)
    {
        return $this->obj_recipt->destroy($request);
    }
}
