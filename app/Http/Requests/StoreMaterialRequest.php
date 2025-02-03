<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMaterialRequest extends FormRequest
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
            'grado'=> 'required|in:lesson,course',
            'type'=>'required|in:file,link,video,pdf',
            'url'=>'required|string|max:255',
            'content'=>'required|string',
            'title'=>'required|string|max:255',
            'order'=>'nullable|integer|min:0',
            'lesson_id'=>'nullable|exists:lessons,id',

            
            'course_ids'=>'nullable|array',
            'course_ids.*'=>'exists:courses,id'
        ];
    }
}
