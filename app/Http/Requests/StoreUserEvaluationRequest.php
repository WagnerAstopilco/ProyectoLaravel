<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserEvaluationRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'evaluation_id' => 'required|exists:evaluations,id',
            'attempt_number' => 'required|integer|min:1',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'score' => 'required|numeric|min:0|max:100',
            'status' => 'required|in:completed,in_progress,failed',
        ];
    }
}
