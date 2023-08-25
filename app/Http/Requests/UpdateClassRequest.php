<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClassRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    { // "_token": "tGflnbfpvupZtncwQGhQ5FPLeFee2NWBREtQKEXm",
        // "Name": "key",
        // "id": "2",
        // "Name_en": "key",
        // "Grade_id": "35"
        // -------------------------

        // 'Name_Class',
        // 'grade_id',
        return [
            'Name' => 'required|unique:classrooms,Name_Class->ar,'.$this->id,
            'Name_en' => 'required|unique:classrooms,Name_Class->en,'.$this->id,
            'Grade_id' => 'required',
        ];
    }
}
