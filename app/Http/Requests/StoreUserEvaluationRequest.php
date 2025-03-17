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
            'attempt_number' => 'required|integer|gte:1',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'score' => 'required|numeric|get:0|lte:100',
            'availability'=>'required|in:activo,inactivo',
            'status' => 'required|in:completed,in_progress,failed',
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
