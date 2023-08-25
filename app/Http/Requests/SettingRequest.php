<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'current_session' => 'required',
            'school_title' => 'required',
            'school_name' => 'required',
            'end_first_term' => 'required',
            'end_second_term' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'school_email' => 'required',
            'old_file'=>'required'
        ];
    }
}