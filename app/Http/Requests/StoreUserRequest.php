<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'names' => 'required|string|min:3|max:255|regex:/^[\pL\s]+$/u',
            'last_names' => 'required|string|min:3|max:255|regex:/^[\pL\s]+$/u',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required|in:admin,comercial,supervisor,alumno,capacitador',
            'status' => 'required|in:activo,inactivo',
            'phone_number' => 'nullable|string|min:9|max:20',
            'birthday_date' => 'nullable|date|before:'.now()->subYears(18)->format('Y-m-d'),
            'country' => 'nullable|string|min:3|max:255',
            'city' => 'nullable|string|min:3|max:255',
            'address_type' => 'nullable|in:jiron,calle,pasaje,avenida,prolongacion',
            'address' => 'nullable|string|min:3|max:255',
            'address_number' => 'nullable|string|min:0|max:255|regex:/^[a-zA-Z0-9\-]+$/',
            'document_type' => 'nullable|in:pasaporte,dni,cedula',
            'document_number' => 'nullable|string|max:50|regex:/^[a-zA-Z0-9\-]+$/|unique:users,document_number',
            'gender' => 'nullable|in:M,F',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'speciality' => 'nullable|string|max:255',
            'biography' => 'nullable|string',


            'lesson_ids' => 'nullable|array',  
            'lesson_ids.*' => 'exists:lessons,id',
            'lesson_ids.*.state' => 'required_with:lesson_ids|in:visto,pendiente',
        ];
    }
    public function attributes()
    {
        return [
            'names'=>'nombres',
            'last_names'=>'apellidos',
            'email'=>'correo',
            'password'=>'contraseña',
            'role'=>'rol',
            'status'=>'estado',
            'phone_number'=>'numero telefónico',
            'birthday_date'=>'fecha de nacimiento',
            'country'=>'país',
            'city'=>'ciudad',
            'address_type'=>'tipo de calle',
            'address'=>'calle',
            'address_number'=>'número de calle',
            'document_type'=>'tipo de documento',
            'document_number'=>'número de documento',
            'gender'=>'género',
            'photo'=>'foto',
            'speciality'=>'especialidad',
            'biography'=>'biografía',
        ];
    }
}
