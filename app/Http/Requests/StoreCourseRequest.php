<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
            'name_long' => 'required|string|max:255|unique:courses,name_long|regex:/^[a-zA-Z0-9_-]+$/',
            'name_short' => 'required|string|max:100|unique:courses,name_short|regex:/^[a-zA-Z0-9_-]+$/',
            'price' => 'required|numeric|min:0|max:999999.99',
            'discount' => 'nullable|numeric|min:0|max:100',
            'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
            'store_id' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',

            'module_ids' => 'nullable|array',  
            'module_ids.*' => 'exists:modules,id',

            'material_ids'=>'nullable|array',
            'material_ids.*'=>'exists:materials,id',

            'trainer_ids'=>'nullable|array',
            'trainer_ids.*'=>'exists:trainers,id'
        ];
    }
}
