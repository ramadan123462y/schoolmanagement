<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportAttendentRequest extends FormRequest
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
            'from' => 'required|date|before_or_equal:' . date('Y-m-d H:i:s'),
            'to' => 'required|date|after_or_equal:to',
            'student_id' => 'required',
        ];
    }
}
