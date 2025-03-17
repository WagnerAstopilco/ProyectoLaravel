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
            'title'=> 'sometimes|required|string|min:2|max:255',
            'start_date'=> 'sometimes|required|date',
            'end_date'=> 'sometimes|required|date|after_or_equal:start_date',
            'duration'=> 'sometimes|required|date_format:H:i:s',
            'attempts_allowed'=> 'sometimes|required|number|min:1',
            'course_id'=> 'sometimes|required|exists:courses,id'
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
