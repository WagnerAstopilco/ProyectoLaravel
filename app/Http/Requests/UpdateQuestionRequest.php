<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionRequest extends FormRequest
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
            'evaluation_id' => 'sometimes|required|exists:evaluations,id',
            'type' => 'sometimes|required|in:multiple_choise,open',
            'question_text' => 'sometimes|required|string',
            'weight' => 'sometimes|required|numeric|min:1',
        ];
    }
}
