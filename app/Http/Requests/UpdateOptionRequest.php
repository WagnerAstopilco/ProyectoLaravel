<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOptionRequest extends FormRequest
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
            'question_id'=>'sometimes|required|exists:questions,id',
            'option'=>'sometimes|required|string|max:255',
            'is_correct'=>'sometimes|required|boolean',
        ];
    }
    public function attributes(){
        return [
            'question_id' => 'pregunta',
            'option' => 'opción',
            'is_correct' => 'validez',
        ];
    }
}
