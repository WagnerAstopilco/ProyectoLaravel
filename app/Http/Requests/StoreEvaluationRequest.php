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
            'title'=>'required|string|min:2|max:255',
            'start_date'=>'required|date',
            'end_date'=>'required|date|after_or_equal:start_date',
            'duration'=>'required|date_format:H:i',
            'attempts_allowed'=>'required|integer|min:1',
            'course_id'=>'required|exists:courses,id'
        ];
    }
    public function attributes(){
        return [
            'title'=>'título',
            'start_date'=>'fecha de inicio',
            'end_date'=>'fecha de fin',
            'duration'=>'duracion',
            'attempts_allowed'=>'intentos permitidos',
            'course_id'=>'curso',
        ];
    }
}
