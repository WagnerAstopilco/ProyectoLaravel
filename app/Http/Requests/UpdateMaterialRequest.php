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
            'title' => 'sometimes|required|string|min:3|max:255',
            'grade' => 'sometimes|required|in:leccion,curso',
            'type' => 'sometimes|required|in:file,link,video,text',
            'url' => 'sometimes|required|string|min:3|max:255',
            'content' => 'sometimes|required|string',
            'order_in_lesson' => 'sometimes|nullable|numeric|gte:1',
            'lesson_id' => 'sometimes|nullable|exists:lessons,id',

            'course_id'=>'sometimes|nullable|exists:courses,id'
        ];
    }
    public function attributes(){
        return[
            'title'=>'título',
            'grade'=>'grado',
            'type'=>'tipo',
            'url'=>'enlace',
            'content'=>'contenido',
            'order_in_lesson'=>'orden',
            'lesson_id'=>'lencción',
            'course_id'=>'curso',
        ];
    }
}
