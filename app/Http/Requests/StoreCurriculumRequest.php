<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCurriculumRequest extends FormRequest
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
            'order'=>'required|integer',
            'module_id'=>'required|exists:modules,id',
            'course_id'=>'required|exists:courses,id'
        ];
    }
    public function attributes(){
        return [
            'order'=>'orden',
            'module_id'=>'módulo',
            'course_id'=>'curso'
        ];
    }
}
