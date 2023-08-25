<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\App;
use Illuminate\Foundation\Http\FormRequest;

class StoreGradeRequest extends FormRequest
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
            "Name_ar" => 'required|unique:grades,Name->ar',
            "Name_en" => 'required|unique:grades,Name->en',

        ];
    }
    public function messages()
    {


            return [

                'Name_ar.required' => trans('validation.required'),
                'Name_en.required' => trans('validation.required')

            ];




    }
}
