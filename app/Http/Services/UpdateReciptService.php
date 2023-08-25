<?php

namespace App\Http\Services;

use App\Models\FundAccount;
use App\Models\ReceiptStudent;
use App\Models\Student;
use App\Models\StudentAccount;

class  UpdateReciptService
{
    public function update_recipt_student($request)
    {

        ReceiptStudent::find($request->id)->update([

            'date' => date('Y-m-d'),
            'student_id' => $request->student_id,
            'Debit' => $request->Debit,
            'description' => $request->description,

        ]);
    }
    public function update_fund_account($request)
    {
        FundAccount::where('receipt_id', $request->id)->update([
            'date' => date('Y-m-d'),
            'receipt_id' => $request->id,
            'Debit' => $request->Debit,
            'credit' => 0.00,
            'description' => $request->description,
        ]);
    }
    public function update_student_account($request)
    {
        StudentAccount::where('receipt_id', $request->id)->update([
            'receipt_id' => $request->id,
            'student_id' => $request->student_id,
            'Debit' => 0.00,
            'credit' => $request->Debit,
            'description' => $request->description,
        ]);
    }
}
