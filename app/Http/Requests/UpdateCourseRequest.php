<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
            'name_long' => 'sometimes|required|string|max:255|unique:courses,name_long,' . $this->course->id,
            'name_short' => 'sometimes|required|string|max:100|unique:courses,name_short,' . $this->course->id,
            'price' => 'sometimes|required|numeric|min:0|max:999999.99',
            'discount' => 'sometimes|nullable|numeric|min:0|max:100',
            'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'sometimes|required|string',
            'store_id' => 'sometimes|required|string|max:255',
            'category_id' => 'sometimes|required|exists:categories,id',

            'module_ids' =>'sometimes|nullable|array',  
            'module_ids.*' =>'sometimes|exists:modules,id',

            'material_ids'=>'sometimes|nullable|array',
            'material_ids.*'=>'sometimes|exists:materials,id',

            'trainer_ids'=>'sometimes|nullable|array',
            'trainer_ids.*'=>'sometimes|exists:trainers,id'
        ];
    }
}
