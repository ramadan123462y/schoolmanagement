<?php

namespace App\Http\Services;

use App\Models\FundAccount;
use App\Models\ReceiptStudent;
use App\Models\Student;
use App\Models\StudentAccount;

class StoreReciptService
{
    public function store_recipt_student($request)
    {

        $receipt_id =  ReceiptStudent::create([
            'date' => date('Y-m-d'),
            'student_id' => $request->student_id,
            'Debit' => $request->Debit,
            'description' => $request->description,
        ]);
        return $receipt_id;
    }
    public function store_fund_account($request, $receipt_id)
    {

        FundAccount::create([

            'date' => date('Y-m-d'),
            'receipt_id' => $receipt_id->id,
            'Debit' => $request->Debit,
            'credit' => 0.00,
            'description' => $request->description,

        ]);
    }
    public function store_student_account($request, $receipt_id)
    {

        StudentAccount::create([

            'receipt_id' => $receipt_id->id,
            'student_id' => $request->student_id,
            'Debit' => 0.00,
            'credit' => $request->Debit,
            'description' => $request->description,
        ]);
    }

}
