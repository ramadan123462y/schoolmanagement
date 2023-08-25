<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quize;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Requests\QuestionRequest;
class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('pages.Questions.index', compact('questions'));
    }
    //-----------------------------------------

    public function create()
    {
        $quizzes = Quize::all();
        return view('pages.Questions.create', compact('quizzes'));
    }

    //-----------------------------------------
    public function store(QuestionRequest $request)
    {
        try {
            Question::create([
                'title' => $request->title,
                'answers' => $request->answers,
                'right_answer' => $request->right_answer,
                'quize_id' => $request->quizze_id,
                'score' => $request->score,
            ]);
            return redirect('question')->with('message', 'Data ADD Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    //-----------------------------------------
    public function edit($id)
    {
        try {
            $question = Question::find($id);
            $quizzes = Quize::all();
            return view('pages.Questions.edit', compact('question', 'quizzes'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    //-----------------------------------------

    public function update(QuestionRequest $request)
    {
        try {
            Question::find($request->id)->update([
                'title' => $request->title,
                'answers' => $request->answers,
                'right_answer' => $request->right_answer,
                'quize_id' => $request->quizze_id,
                'score' => $request->score,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        return redirect('question')->with('message', 'Data Updated Successfully');
    }

    //-----------------------------------------
    public function destroy(Request $request)
    {
        try {
            Question::find($request->id)->delete();
            return redirect('question')->with('message', 'Data Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
