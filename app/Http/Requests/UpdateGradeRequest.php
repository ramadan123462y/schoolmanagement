<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGradeRequest extends FormRequest
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
    {
          // "_token": "2acF7MXWEEkWkNKrdTO6RC7NCxxGcWKISj3U37bC",
        // "Name": "المرحله الثانيه",
        // "id": "2",
        // "Name_en": "second",
        // "Notes": null
        return [
            'Name'=>'required|unique:grades,Name->ar,'.$this->id,
            'Name_en'=>'required|unique:grades,Name->en,'.$this->id,
        ];
    }
}
