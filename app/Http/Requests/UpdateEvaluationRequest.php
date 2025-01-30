<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEvaluationRequest extends FormRequest
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
            'title'=>'sometimes|required|string|max:255',
            'start_date'=>'sometimes|requred|date',
            'end_date'=>'sometimes|required|date',
            'duration'=>'sometimes|required|date_format:H:i:s',
            'attempts_allowed'=>'sometimes|required|integer|min:1',
            'course_id'=>'sometimes|required|exists:courses,id'
        ];
    }
}
