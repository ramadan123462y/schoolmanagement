<?php

namespace App\Http\Controllers\Fees;

use App\Http\Controllers\Controller;
use App\Models\Fees;
use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Requests\FeesRequest;

class FeesController extends Controller
{

    public function index()
    {
        $fees = Fees::get();
        return view('pages.Students.Fees.index', compact('fees'));
    }

   // --------------------------------------------
    public function create()
    {
        $Grades = Grade::get();
        return view('pages.Students.Fees.add', compact('Grades'));
    }

     // --------------------------------------------
    public function store(FeesRequest $request)
    {
        try {
            $this->store_fees($request);
            return redirect()->back()->with('message', 'Data Aded Successfully');
        } catch (\Exception $e) {


            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

   // --------------------------------------------
    public function edit($id)
    {
        $Grades = Grade::get();
        $fee = Fees::find($id);
        return view('pages.Students.Fees.edit', compact('fee', 'Grades'));
    }

   // --------------------------------------------
    public function update(FeesRequest $request)
    {
        try {
            $this->update_fees($request);
            return redirect('fees')->with('message', 'Data Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    // -----------------------------------------------------------------------------
    public function destroy(Request $request)
    {
        try {
            Fees::find($request->id)->delete();
            return redirect('fees')->with('message', 'Data Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
       // --------------------------------------------
    private function store_fees($request)
    {

        Fees::create([
            'title' => [

                'ar' => $request->title_ar,
                'en' => $request->title_en,

            ],
            'amount' => $request->amount,
            'grade_id' => $request->Grade_id,
            'classroom_id' => $request->Classroom_id,
            'year' => $request->year,
            'description' => $request->description
        ]);
    }
    private function update_fees($request)
    {

        Fees::find($request->id)->update([

            'title' => [

                'ar' => $request->title_ar,
                'en' => $request->title_en,

            ],
            'amount' => $request->amount,
            'grade_id' => $request->Grade_id,
            'classroom_id' => $request->Classroom_id,
            'year' => $request->year,
            'description' => $request->description

        ]);
    }
}
