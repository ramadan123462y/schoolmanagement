<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSectionRequest extends FormRequest
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

        // "_token": "App9w4KfHk9ymOuYiu68NubcTw6cTEg6c61WYHUW",
        // "Name_Section_Ar": "سيت",
        // "Name_Section_En": "key",
        // "Grade_id": "34",
        // "Class_id": "18",
        // "Status": "on"
        return [
           "Name_Section_Ar" => 'required',
            "Name_Section_En" => 'required',
            "Grade_id" => 'required',
            "Class_id" => 'required',

        ];
    }
}
