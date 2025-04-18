<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreModuleRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:255|regex:/^[\pL\pN\s_-]+$/u|unique:modules,name',
            'description' => 'nullable|string'            
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
