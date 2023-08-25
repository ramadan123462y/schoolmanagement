<?php

namespace App\Http\Repositories;

use App\Models\FundAccount;
use App\Models\ReceiptStudent;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ReciptRequest;
use App\Http\Services\StoreReciptService;
use App\Http\Services\UpdateReciptService;

class ReciptRepositie implements ReciptInterface
{
    protected $obj_store_recipt;
    protected $obj_update_recipt;

    public function __construct(StoreReciptService $storerecipt, UpdateReciptService $updaterecipt)
    {
        $this->obj_store_recipt = $storerecipt;
        $this->obj_update_recipt = $updaterecipt;
    }

    public function index()
    {
        $receipt_students = ReceiptStudent::get();
        return view('pages.Recipt.index', compact('receipt_students'));
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $receipt_id = $this->obj_store_recipt->store_recipt_student($request);
            $this->obj_store_recipt->store_fund_account($request, $receipt_id);
            $this->obj_store_recipt->store_student_account($request, $receipt_id);
            DB::commit();
            return redirect()->back()->with('message', 'Data Aded Succefully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $student = Student::find($id);
        return view('pages.Recipt.add', compact('student'));
    }


    public function edit($id)
    {
        $receipt_student = ReceiptStudent::find($id);
        return view('pages.Recipt.edit', compact('receipt_student'));
    }


    public function update($request)
    {
        DB::beginTransaction();

        try {
            $this->obj_update_recipt->update_recipt_student($request);
            $this->obj_update_recipt->update_fund_account($request);
            $this->obj_update_recipt->update_student_account($request);
            DB::commit();
            return redirect('recipt')->with('message', 'Data Aded Succefully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function destroy($request)
    {
        ReceiptStudent::find($request->id)->delete();
        return redirect()->back()->with('message', 'Data Deleted Succefully');
    }
}
