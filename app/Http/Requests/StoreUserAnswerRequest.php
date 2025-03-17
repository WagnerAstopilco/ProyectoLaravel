<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserAnswerRequest extends FormRequest
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
            'user_evaluation_id' => 'required|exists:user_evaluations,id',
            'question_id' => 'required|exists:questions,id',
            'answer_text' => 'required|string',
            'is_correct' => 'required|boolean',
        ];
    }
    public function attributes(){
        return[
            'user_evaluation_id' => 'alumno',
            'question_id' => 'pregunta',
            'answer_text' => 'respuesta',
            'is_correct' => 'validez',
        ];
    }
}
