<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Invoice_Interface;
use App\Models\Fees;
use App\Models\FeesInvoice;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    protected $obj_invoice;
    public function __construct(Invoice_Interface $obj_invoice)
    {
        return  $this->obj_invoice = $obj_invoice;
    }
    public function index()
    {
        return $this->obj_invoice->index();
    }

    public function store(Request $request)
    {
        return  $this->obj_invoice->store($request);
    }

    public function show($id)
    {
        return $this->obj_invoice->show($id);
    }

    public function edit($id)
    {
        return $this->obj_invoice->edit($id);
    }

    public function update(Request $request)
    {
        return $this->obj_invoice->update($request);
    }

    public function get_mount_byfees($id)
    {

        return $this->obj_invoice->get_mount_byfees($id);
    }

    public function destroy(Request $request)
    {
        return $this->obj_invoice->destroy($request);
    }
}
