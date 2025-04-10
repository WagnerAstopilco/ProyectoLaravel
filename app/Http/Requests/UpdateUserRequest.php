<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'names' => 'sometimes|required|string|min:3|max:255|regex:/^[\pL\s]+$/u',
            'last_names' => 'sometimes|required|string|min:3|max:255|regex:/^[\pL\s]+$/u',
            'email' => 'sometimes|required|email|unique:users,email,'.$this->user->id,
            'password' => 'sometimes|required|min:8',
            'role' => 'sometimes|required|in:admin,comercial,supervisor,alumno,capacitador',
            'status' => 'sometimes|required|in:activo,inactivo',
            'phone_number' => 'sometimes|nullable|string|min:9|max:20',
            'birthday_date' => 'sometimes|nullable|date|before:' . now()->subYears(18)->format('Y-m-d'),
            'country' => 'sometimes|nullable|string|min:3|max:255',
            'city' => 'sometimes|nullable|string|min:3|max:255',
            'address_type' => 'sometimes|nullable|in:jiron,calle,pasaje,avenida,prolongacion',
            'address' => 'sometimes|nullable|string|min:3|max:255',
            'address_number' => 'sometimes|nullable|string|min:0|max:255|regex:/^[a-zA-Z0-9\-]+$/',
            'document_type' => 'sometimes|nullable|in:pasaporte,dni,cedula',
            'document_number' => 'sometimes|nullable|string|max:50|regex:/^[a-zA-Z0-9\-]+$/|unique:users,document_number,'.$this->user->id,
            'gender' => 'sometimes|nullable|in:M,F',
            'photo' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'speciality' => 'sometimes|nullable|string|max:255',
            'biography' => 'sometimes|nullable|string',
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
