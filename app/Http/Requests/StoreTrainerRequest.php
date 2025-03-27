<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrainerRequest extends FormRequest
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
            'certifications'=>'nullable|string',
            'user_id'=>'required|exists:users,id',

            'course_ids'=>'nullable|array',
            'course_ids.*'=>'exists:courses,id'
        ];
    }
    public function attributes(){
        return[
            'certifications'=>'certificaciones',
        ];
    }
}
