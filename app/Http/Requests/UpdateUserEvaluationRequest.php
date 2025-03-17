<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserEvaluationRequest extends FormRequest
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
            'user_id' => 'sometimes|required|exists:users,id',
            'evaluation_id' => 'sometimes|required|exists:evaluations,id',
            'attempt_number' => 'sometimes|required|integer|gte:1',
            'start_time' => 'sometimes|required|date',
            'end_time' => 'sometimes|required|date',
            'score' => 'sometimes|required|numeric|get:0|lte:100',
            'availability'=>'rsometimes|equired|in:activo,inactivo',
            'status' => 'sometimes|required|in:completed,in_progress,failed',
        ];
    }
    public function attributes(){
        return [
            'user_id' => 'alumno',
            'evaluation_id' => 'evaluación',
            'attempt_number' => 'número de intentos',
            'start_time' => 'fecha de inicio',
            'end_time' => 'fecha de fin',
            'score' => 'puntaje',
            'availability' => 'disponibilidad',
            'status' => 'estado',
        ];
    }
}
