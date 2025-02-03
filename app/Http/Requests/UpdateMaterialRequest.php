<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMaterialRequest extends FormRequest
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
            'grado'=>'sometimes|required|in:lesson,course',
            'type'=>'sometimes|required|in:file,link,video,pdf',
            'url'=>'sometimes|required|string|max:255',
            'content'=>'sometimes|required|string',
            'title'=>'sometimes|required|string|max:255',
            'order'=>'sometimes|nullable|integer|min:0',
            'lesson_id'=>'sometimes|nullable|exists:lessons,id',

            'course_ids'=>'sometimes|nullable|array',
            'course_ids.*'=>'sometimes|exists:courses,id'
        ];
    }
}
