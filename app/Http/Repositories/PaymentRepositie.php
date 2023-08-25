<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\FundAccount;
use App\Models\Payment_student;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Http\Request;
use App\Http\Requests\PaymentRequest;

class PaymentRepositie implements PaymentInterface
{
    public function index()
    {
        $payment_students = Payment_student::get();
        return view('pages.Payment.index', compact('payment_students'));
    }
    // ------------------------------------------------------------
    public function store($request)
    {
        DB::beginTransaction();
        try {
            $payment_students = $this->store_payment($request);
            $this->store_Fund_account($request, $payment_students);
            $this->store_student_account($request, $payment_students);
            DB::commit();
            return redirect('student')->with('message', "data Aded Successfully");
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    // ------------------------------------------------------------
    public function show($id)
    {
        $student =  Student::find($id);
        return view('pages.Payment.add', compact('student'));
    }
    // ------------------------------------------------------------
    public function edit($id)
    {
        $payment_student = Payment_student::find($id);
        return view('pages.Payment.edit', compact('payment_student'));
    }
    // ------------------------------------------------------------
    public function update($request)
    {
        DB::beginTransaction();
        try {
            $this->update_payment($request);
            $this->update_fund_account($request);
            $this->update_studentaccount($request);
            DB::commit();
            return redirect('payment')->with('message', "data Updated Successfully");
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    // ------------------------------------------------------------

    public function destroy($request)
    {
        try {
            Payment_student::find($request->id)->delete();
            return redirect('payment')->with('message', "data Aded Successfully");
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    // ------------------------------------------------------------
    private function update_studentaccount($request)
    {

        StudentAccount::find($request->id)->update([
            'date' => $request->date,
            'student_id' => $request->student_id,
            'payment_id' => $request->id,
            'Debit' => $request->Debit,
            'credit' => 0.00,
            'description' => $request->description,
        ]);
    }
    // ------------------------------------------------------------
    private function update_payment($request)
    {
        Payment_student::find($request->id)->update([
            'date' => date('Y-m-d'),
            'student_id' => $request->student_id,
            'amount' => $request->Debit,
            'description' => $request->description,
        ]);
    }
    // ------------------------------------------------------------
    private function update_fund_account($request)
    {
        FundAccount::find($request->id)->update([
            'date' => date('Y-m-d'),
            'payment_id' => $request->id,
            'Debit' => 0.00,
            'credit' => $request->Debit,
            'description' => $request->description,

        ]);
    }
    // ------------------------------------------------------------
    private function store_payment($request)
    {
        $payment_students =   Payment_student::create([
            'date' => date('Y-m-d'),
            'student_id' => $request->student_id,
            'amount' => $request->Debit,
            'description' => $request->description,
        ]);
        return $payment_students;
    }
    // ------------------------------------------------------------
    private function store_Fund_account($request, $payment_students)
    {
        FundAccount::create([
            'date' => date('Y-m-d'),
            'payment_id' => $payment_students->id,
            'Debit' => 0.00,
            'credit' => $request->Debit,
            'description' => $request->description,

        ]);
    }
    // ------------------------------------------------------------
    private function store_student_account($request, $payment_students)
    {
        StudentAccount::create([
            'date' => $request->date,
            'student_id' => $request->student_id,
            'payment_id' => $payment_students->id,
            'Debit' => $request->Debit,
            'credit' => 0.00,
            'description' => $request->description,
        ]);
    }
    // ------------------------------------------------------------
}
