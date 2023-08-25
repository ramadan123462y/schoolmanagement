<?php

namespace App\Http\Controllers\Teacher\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quize;
use Illuminate\Http\Request;
use App\Http\Requests\QuestionRequest;

class QuestionController extends Controller
{


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
            return redirect()->back()->with('message', 'Data ADD Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function show($id)
    {
        $quize = Quize::find($id);

        return view('pages.Teachers.dashboard.Questions.create', compact('quize'));
    }


    public function edit($id)
    {
        try {
            $question = Question::find($id);
            $quizzes = Quize::all();
            return view('pages.Teachers.dashboard.Questions.edit', compact('question', 'quizzes'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


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
            return redirect()->route('Quize.show',$request->quizze_id)->with('message', 'Data Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

//-----------------------------------------
public function destroy(Request $request)
{
    try {
        $question= Question::find($request->id);
       $question->delete();
        return redirect()->route('Quize.show',$question->quize->id)->with('message', 'Data Deleted Successfully');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
}
}
