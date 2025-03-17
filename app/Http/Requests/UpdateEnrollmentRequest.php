<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEnrollmentRequest extends FormRequest
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
            'user_id'=> 'sometimes|required|exists:users,id',
            'course_id'=> 'sometimes|required|exists:courses,id',
            'enrollment_date'=> 'sometimes|required|date',
            'end_enrollment_date'=> 'sometimes|required|date',
            'status'=> 'sometimes|required|in:activo,inactivo'
        ];
    }
    public function attributes(){
        return [
            'user_id'=>'usuario',
            'course_id'=>'curso',
            'enrollment_date'=>'fecha de inicio de matrícula',
            'end_enrollment_date'=>'fecha de fin de matrícula',
            'status'=>'estado',
        ];
    }
}
