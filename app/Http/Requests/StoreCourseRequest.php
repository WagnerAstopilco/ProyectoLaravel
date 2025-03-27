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
            'name_long' => 'required|string|min:5|max:255|unique:courses,name_long|regex:/^[\pL\pN\s_-]+$/u',
            'name_short' => 'required|string|min:3|max:100|unique:courses,name_short|regex:/^[\pL\pN\s_-]+$/u',
            'price' => 'required|numeric|gte:0|lte:999999.99',
            'discount' => 'nullable|numeric|gte:0|lte:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',  
            'duration_in_hours' =>'required|integer|gte:1',
            'description' => 'required|string',
            'store_id' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',

            'module_ids'=>'nullable|array',
            'module_ids.*'=>'exists:modules,id',

            'material_ids'=>'nullable|array',
            'material_ids.*'=>'exists:materials,id',
            'material_ids.*.order' => 'required_with:material_ids|integer|gte:1',

            'trainer_ids'=>'nullable|array',
            'trainer_ids.*'=>'exists:trainers,id'
        ];
    }
    public function attributes()
    {
        return [
            'name_long'=>'nombre',
            'name_short'=>'abreviación',
            'price'=>'precio',
            'discount'=>'descuento',
            'image'=>'imagen',
            'description'=>'descripción',
            'start_date'=>'fecha de inicio',
            'end_date'=>'fecha de fin',
            'duration_in_hours'=>'horas de duración',
            'store_id'=>'tienda',
            'category_id'=>'categoria', 
        ];
    }
}
