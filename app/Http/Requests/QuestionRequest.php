<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }



    public function rules(): array
    {
        return [
            'title' => 'required',
            'answers' => 'required',
            'right_answer' => 'required',
            'quizze_id' => 'required',
            'score' => 'required',
        ];
    }
}
