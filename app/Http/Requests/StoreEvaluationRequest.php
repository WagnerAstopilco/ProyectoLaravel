<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEvaluationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|string|max:255',
            'start_date'=>'requred|date',
            'end_date'=>'required|date',
            'duration'=>'required|date_format:H:i:s',
            'attempts_allowed'=>'required|integer|min:1',
            'course_id'=>'required|exists:courses,id'
        ];
    }
}
