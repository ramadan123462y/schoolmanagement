<?php

namespace App\Http\Repositories;

use App\Models\Fees;
use App\Models\FeesInvoice;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class InvoiceRepositie implements Invoice_Interface
{

    public function index()
    {
        $Fee_invoices = $this->get_all_invoices();
        return view('pages.Students.Invoices_fees.index', compact('Fee_invoices'));
    }


    public function store($request)
    {
        DB::beginTransaction();
        try {
            foreach ($request->List_Fees as $fee) {
                $invoice = $this->store_invoice($fee, $request);
                $this->store_accounts($fee, $invoice);
            }
            DB::commit();
            return redirect()->back()->with('message', "Data Aded Successfully");
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function show($id)
    {
        $student = $this->get_stydent_by_id($id);
        $fees = $this->get_all_fees();
        return view('pages.Students.Invoices_fees.add', compact(
            'student',
            'fees'
        ));
    }

    public function edit($id)
    {
        $fees = $this->get_all_fees();
        $fee_invoices = $this->get_invoice_id($id);
        return view('pages.Students.Invoices_fees.edit', compact('fee_invoices', 'fees'));
    }

    public function update($request)
    {
        DB::beginTransaction();
        try {
            $this->update_invoice($request);
            $this->update_student_account($request);
            DB::commit();
            return redirect('invoice')->with('message', 'Data Updated Successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function get_mount_byfees($id)
    {

        $mount = $this->get_fees_by_id($id)->amount;
        return json_encode($mount);
    }
    public function destroy($request)
    {
        try {
            FeesInvoice::find($request->id)->delete();
            return redirect()->back()->with('message', 'Data Deleted Successfully');
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // -------------------------------------------------------------------
    private function get_all_invoices()
    {

        return  FeesInvoice::get();
    }



    private function get_fees_by_id($id)
    {

        return Fees::find($id);
    }
    private function store_accounts($fee, $invoice)
    {
        StudentAccount::create([
            'student_id' => $fee['student_id'],
            'feesInvoice_id' => $invoice->id,
            'Debit' => $fee['amount'],
            'credit' => 0.00,
            'description' => $fee['description'],
        ]);
    }
    private function update_invoice($request)
    {
        FeesInvoice::find($request->id)->update([
            'amount' => $request->amount,
            'description' => $request->description,
            'fees_id' => $request->fee_id
        ]);
    }
    private function update_student_account($request)
    {
        StudentAccount::where('feesInvoice_id', $request->id)->update([
            'Debit' => $request->amount,
            'credit' => 0.00,
            'description' => $request->description,
        ]);
    }
    private function store_invoice($fee, $request)
    {
        $invoice =  FeesInvoice::create([
            'invoice_date' => date("Ymd"),
            'amount' => $fee['amount'],
            'description' => $fee['description'],
            'student_id' => $fee['student_id'],
            'grade_id' => $request->Grade_id,
            'classroom_id' => $request->Classroom_id,
            'fees_id' => $fee['fee_id'],
        ]);
        return $invoice;
    }
    private function get_stydent_by_id($id)
    {
        return Student::find($id);
    }
    private function get_all_fees()
    {

        return Fees::get();
    }
    private function get_invoice_id($id)
    {

        return FeesInvoice::find($id);
    }
}
