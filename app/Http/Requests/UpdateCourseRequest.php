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
            // 'name_long' => 'sometimes|required|string|min:5|max:255|regex:/^[\pL\pN\s_-]+$/u|unique:courses,name_long,' . $this->course->id,
            // 'name_short' => 'sometimes|required|string|min:3|max:100|regex:/^[\pL\pN\s_-]+$/u|unique:courses,name_short,' . $this->course->id,
            // 'price' => 'sometimes|required|numeric|min:0|max:999999.99',
            // 'discount' => 'sometimes|nullable|numeric|min:0|max:100',
            // 'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'description' => 'sometimes|required|string',
            // 'start_date' => 'sometimes|required|date',
            // 'end_date'   => 'sometimes|required|date|after_or_equal:start_date',  
            // 'duration_in_hours' =>'sometimes|required|numeric|gte:0',
            // 'store_id' => 'sometimes|required|string|max:255',
            // 'category_id' => 'sometimes|required|exists:categories,id',

            // 'module_ids' =>'sometimes|nullable|array',  
            // 'module_ids.*' =>'sometimes|exists:modules,id',

            // 'material_ids'=>'sometimes|nullable|array',
            // 'material_ids.*'=>'sometimes|exists:materials,id',

            // 'trainer_ids'=>'sometimes|nullable|array',
            // 'trainer_ids.*'=>'sometimes|exists:trainers,id'
            'name_long' => 'sometimes|string|max:255',
            'name_short' => 'sometimes|string|max:255',
            'price' => 'sometimes|numeric|min:0',
            'start_date' => 'sometimes|required|date',
            'end_date'   => 'sometimes|required|date',  
            'duration_in_hours' =>'sometimes|required|numeric',
            'description' => 'sometimes|string',
            'store_id' => 'sometimes|string',
            'discount' => 'sometimes|numeric|min:0|max:100',
            'category_id' => 'sometimes|exists:categories,id',
            'image' => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }
}
