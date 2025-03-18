<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLessonRequest extends FormRequest
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
            'title' => 'required|string|min:5|max:255',
            'description' => 'nullable|string',
            'order' => 'required|integer|gte:1',
            'state'=> 'required|in:activo,inactivo',
            'module_id' => 'required|exists:modules,id',

            'user_ids' => 'nullable|array',  
            'user_ids.*' => 'exists:users,id',
            'user_ids.*.state' => 'required_with:user_ids|in:visto,pendiente',
        ];
    }
    public function attributes(){
        return [
            'title'=>'título',
            'description'=>'descripción',
            'order'=>'orden',
            'state'=>'estado',
            'module_id'=>'modulo',
        ];
    }
}
