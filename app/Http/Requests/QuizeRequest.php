<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'Name_ar' => 'required',
            'Name_en' => 'required',
            'subject_id' => 'required',
            'Grade_id' => 'required',
            'Classroom_id' => 'required',
            'section_id' => 'required',
        ];
    }
}
