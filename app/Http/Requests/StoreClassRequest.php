<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassRequest extends FormRequest
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


        return [
            'List_Classes.*.Name' => 'required|unique:classrooms,Name_Class->ar',
            'List_Classes.*.Name_class_en' => 'required|unique:classrooms,Name_Class->en',
            'List_Classes.*.Grade_id' => 'required',
        ];
    }
}
