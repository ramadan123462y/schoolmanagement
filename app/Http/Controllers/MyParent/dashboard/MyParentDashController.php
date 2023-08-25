<?php

namespace App\Http\Controllers\Myparent\dashboard;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Attendance;
use App\Http\Controllers\Controller;
use App\Models\My_Parent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReportAttendentRequest;
use App\Models\Degree;
use App\Models\FeesInvoice;
use App\Models\ReceiptStudent;

class MyParentDashController extends Controller
{
    public function index()
    {

        $sons = My_Parent::find(Auth::guard('parent')->user()->id)->students;

        return view('pages.parents.dashboard', compact('sons'));
    }
    public function attendance()
    {

        $students = $this->get_students();
        return view('pages.parents.Dashboard.Attendance', compact('students'));
    }
    private function get_students()
    {

        $student = Student::where('parent_id', Auth::guard('parent')->user()->id);
        $students = $student->get();
        return $students;
    }

    public function report(ReportAttendentRequest $request)
    {

        if ($request->student_id == 0) {

            $Students = Attendance::whereBetween('attendence_date', [$request->from, $request->to])->get();
        } else {
            $Students =   Attendance::whereBetween('attendence_date', [$request->from, $request->to])->where('student_id', $request->student_id)->get();
        }

        $students = $this->get_students();
        return redirect('parent/attendance')->with(compact('Students', 'students'));
    }
    public function show_degree()
    {

        $ids_student = Student::where('parent_id', Auth::guard('parent')->user()->id)->pluck('id');
        $degrees = Degree::wherein('student_id', $ids_student)->get();
        return view('pages.parents.Dashboard.degree', compact('degrees'));
    }
    public function fees()
    {

        $ids_student = Student::where('parent_id', Auth::guard('parent')->user()->id)->pluck('id');
        $Fee_invoices = FeesInvoice::wherein('student_id', $ids_student)->get();
        return view('pages.parents.Dashboard.Invoice', compact('Fee_invoices'));
    }
    public function show_recipt($id)
    {

        $receipt_students =  ReceiptStudent::where('student_id', $id)->get();
        if (!empty($receipt_students)) {

            return view('pages.parents.Dashboard.recipt', compact('receipt_students'));
        } else {

            return redirect('parent/fees')->with('error', "No Recipted");
        }
    }
    public function profile_index()
    {
        $information = Auth::guard('parent')->user();
        return view('pages.parents.Dashboard.profile', compact('information'));
    }

    public function update_profile(Request $request){

        $request->validate([
            'Name_ar' => 'required',
            'Name_en' => 'required',
            'password' => 'required',
        ]);
        My_Parent::find(Auth::guard('parent')->user()->id)->update([

            'Password' => $request->password,
            'Name_Father' => [

                'ar' => $request->Name_ar,
                'en' => $request->Name_en
            ]



        ]);
        return redirect()->back()->with('message', 'profile Updated');
    }
}
