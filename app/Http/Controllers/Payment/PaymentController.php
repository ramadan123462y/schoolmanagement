<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Repositories\PaymentInterface;
use App\Models\FundAccount;
use App\Models\Payment_student;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Http\Request;
use App\Http\Requests\PaymentRequest;

class PaymentController extends Controller
{
    protected  $obj_payment;

    public function __construct(PaymentInterface $obj_payment)
    {

        $this->obj_payment = $obj_payment;
    }


    public function index()
    {
        return $this->obj_payment->index();
    }

    public function store(PaymentRequest $request)
    {
        return $this->obj_payment->store($request);
    }


    public function show($id)
    {
        return $this->obj_payment->show($id);
    }

    public function edit($id)
    {
        return  $this->obj_payment->edit($id);
    }


    public function update(PaymentRequest $request)
    {
        return  $this->obj_payment->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->obj_payment->destroy($request);
    }
}
