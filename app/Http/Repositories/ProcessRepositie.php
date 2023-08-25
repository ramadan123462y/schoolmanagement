<?php

namespace App\Http\Repositories;

use App\Models\Process_fee;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class ProcessRepositie implements ProcessInterface
{

    // ------------------------------------------
    public function index()
    {
        $ProcessingFees = Process_fee::get();
        return view('pages.Process_fee.index', compact('ProcessingFees'));
    }

    // ------------------------------------------
    public function store($request)
    {
        DB::beginTransaction();
        try {
            $processing_id = $this->store_process($request);
            $this->store_student_account($request, $processing_id);
            DB::commit();
            return redirect('student')->with('message', "Data Aded Successfully");
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // ------------------------------------------
    public function show($id)
    {
        $student = Student::find($id);
        return view('pages.Process_fee.add', compact('student'));
    }

    // ------------------------------------------


    public function edit($id)
    {
        $ProcessingFee =  Process_fee::find($id);
        return view('pages.Process_fee.edit', compact('ProcessingFee'));
    }

    // ------------------------------------------
    public function update($request)
    {
        DB::beginTransaction();
        try {
            $processing_id =  $this->update_process($request);
            $this->upadte_student_account($request);
            DB::commit();
            return redirect('process_fee')->with('message', "Data Updated Successfully");
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // ------------------------------------------
    public function destroy($request)
    {
        try {
            Process_fee::find($request->id)->delete();
            return redirect('process_fee')->with('message', "Data Deleted Successfully");
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // ------------------------------------------
    private function upadte_student_account($request)
    {
        StudentAccount::create([
            'student_id' => $request->student_id,
            'processing_id' => $request->id,
            'Debit' => 0.00,
            'credit' => $request->Debit,
            'description' => $request->description,
        ]);
    }
    private function update_process($request)
    {
        $processing_id =  Process_fee::find($request->id)->update([
            'date' => date('Y-m-d'),
            'student_id' => $request->student_id,
            'amount' => $request->Debit,
            'description' => $request->description,
        ]);
        return $processing_id;
    }
    private function store_process($request)
    {
        $processing_id =  Process_fee::create([
            'date' => date('Y-m-d'),
            'student_id' => $request->student_id,
            'amount' => $request->Debit,
            'description' => $request->description,
        ]);
        return $processing_id;
    }
    private function store_student_account($request, $processing_id)
    {
        StudentAccount::create([
            'student_id' => $request->student_id,
            'processing_id' => $processing_id->id,
            'Debit' => 0.00,
            'credit' => $request->Debit,
            'description' => $request->description,
        ]);
    }
}
