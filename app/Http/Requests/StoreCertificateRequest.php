<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCertificateRequest extends FormRequest
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
            'user_id' => 'required|integer|exists:users,id',
            'course_id' => 'required|integer|exists:courses,id',
            'issue_date' => 'required|date',
            'start_date'=> 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'duration_in_hours' => 'required|numeric|gte:1',
            'code' => 'required|string|max:255',
        ];
    }
    public function attributes(){
        return[
            'user_id'=>'alumno',
            'course_id'=>'curso',
            'issue_date'=>'fecha de emisión',
            'start_date'=>'fecha de inicio',
            'end_date'=>'fecha de fin',
            'duration_in_hours'=>'duración en horas',
            'code'=>'código',
        ];
    }
}
