<?php

namespace App\Http\Controllers\Process_fee;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ProcessInterface;
use App\Models\Process_fee;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Process_feeRequest;

class Process_feesController extends Controller
{
    protected $obj_process;
    public function __construct(ProcessInterface $obj_process)
    {
        $this->obj_process = $obj_process;
    }

    public function index()
    {
        return $this->obj_process->index();
    }

    public function store(Process_feeRequest $request)
    {
        return $this->obj_process->store($request);
    }


    public function show($id)
    {
        return $this->obj_process->show($id);
    }


    public function edit($id)
    {
        return $this->obj_process->edit($id);
    }


    public function update(Process_feeRequest $request)
    {
       return $this->obj_process->update($request);
    }


    public function destroy(Request $request)
    {
       return $this->obj_process->destroy($request);
    }
}
