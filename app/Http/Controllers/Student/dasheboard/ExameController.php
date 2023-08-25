<?php

namespace App\Http\Controllers\Student\dasheboard;

use App\Http\Controllers\Controller;

use App\Models\Quize;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExameController extends Controller
{



    public function index()
    {
        $student = Auth::guard('student')->user();
        $quizzes = Quize::where('grade_id', $student->grade_id)
            ->where('classroom_id', $student->classroom_id)
            ->where('section_id', $student->section_id)
            ->orderBy('id', 'DESC')->get();

        return view('pages.Students.dashboard.Exames.index', compact('quizzes'));
    }
    public function show($id)
    {
        $quize = Quize::find($id);
        $questions = Quize::find($id)->questions;
        $student = Auth::guard('student')->user();
        return view('pages.Students.dashboard.Exames.ShowQuestion', compact('questions', 'quize', 'student'));
    }
}
