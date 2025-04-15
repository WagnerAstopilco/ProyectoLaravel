<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLessonSessionRequest extends FormRequest
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
            'lesson_id' => 'sometimes|required|exists:lessons,id',
            'session_date' => 'sometimes|required|date',
            'start_time' => 'sometimes|required|date_format:H:i',
            'type' => 'sometimes|required|in:zoom,meet',
            'link' => 'sometimes|required|string|max:255',
            'password' => 'sometimes|nullable|string|max:255',
        ];
    }
    public function attributes(){
        return[
            'lesson_id' => 'lección',
            'session_date' => 'fecha de sesión',
            'start_time' => 'hora de inicio',
            'type' => 'tipo',
            'link' => 'enlace',
            'password' => 'contraseña',
        ];
    }
}
