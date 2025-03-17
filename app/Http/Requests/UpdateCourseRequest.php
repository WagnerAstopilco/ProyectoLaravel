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
            'name_long' => 'sometimes|required|string|min:5|max:255|regex:/^[\pL\pN\s_-]+$/u|unique:courses,name_long,' . $this->course->id,
            'name_short' => 'sometimes|required|string|min:3|max:100|regex:/^[\pL\pN\s_-]+$/u|unique:courses,name_short,' . $this->course->id,
            'price' => 'sometimes|required|numeric|gte:0|lte:999999.99',
            'discount' => 'sometimes|nullable|numeric|gte:0|lte:100',
            'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'sometimes|required|string',
            'start_date' => 'sometimes|required|date',
            'end_date'   => 'sometimes|required|date|after_or_equal:start_date',  
            'duration_in_hours' =>'sometimes|required|integer|gte:1',
            'store_id' => 'sometimes|required|string|max:255',
            'category_id' => 'sometimes|required|exists:categories,id',

            'module_ids' =>'sometimes|nullable|array',  
            'module_ids.*' =>'sometimes|exists:modules,id',
            'module_ids.*.order' => 'sometimes|required_with:module_ids|integer|gte:1',

            'material_ids'=>'sometimes|nullable|array',
            'material_ids.*'=>'sometimes|exists:materials,id',

            'trainer_ids'=>'sometimes|nullable|array',
            'trainer_ids.*'=>'sometimes|exists:trainers,id'
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
            
            'module_ids' => 'modulos',
            'module_ids.*.order' => 'orden del módulo',
            'material_ids' => 'materiales',
            'trainer_ids' => 'capacitadores',
        ];
    }
}
