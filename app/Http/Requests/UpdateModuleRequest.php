<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateModuleRequest extends FormRequest
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
            'name' => 'sometimes|required|string|min:3|max:255|regex:/^[\pL\pN\s_-]+$/u|unique:modules,name,' . $this->module->id,
            'description' => 'sometimes|nullable|string',

            'course_ids'=>'nullable|array',
            'course_ids.*'=>'exists:courses,id'
        ];
    }
    public function attributes()
    {
        return [
            'name'=>'nombre',
            'description'=>'descripción',
            
        ];
    }
}
