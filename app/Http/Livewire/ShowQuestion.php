<?php

namespace App\Http\Livewire;

use App\Models\Degree;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;




class ShowQuestion extends Component
{


    public $quize;
    public $questions;
    public $student;
    public $count = 0;
    public $examecount = 0;
    public $degree = 0;
    public function render()
    {
        $this->questions;
        $this->examecount = $this->questions->count();
        return view('livewire.show-question', ['questions', 'examecount']);
    }
    public function nextquestion($right_answer, $answer, $score)
    {
        if (strcmp(trim($right_answer), trim($answer))   === 0) {

            $this->degree += $score;
        } else {

            $this->degree += 0;
        }

        if ($this->examecount - 1 >  $this->count) {
            $this->count++;
        } else {
            $this->store_degree();
            return redirect('student/exames')->with('message', "Exame Sucessfully");
        }
    }
    public function store_degree()
    {
        Degree::create([
            'score' =>  $this->degree,
            'date' => date('Y-m-d H:i:s'),
            'quize_id' => $this->quize->id,
            'student_id' => Auth::guard('student')->user()->id,

        ]);
    }
}
