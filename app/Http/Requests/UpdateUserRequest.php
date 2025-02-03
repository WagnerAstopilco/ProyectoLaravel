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
            'names' => 'sometimes|required|string|max:255',
            'last_names' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,'.$this->user->id,
            'password' => 'sometimes|required|min:8',
            'role' => 'sometimes|required|in:admin,comercial,supervisor,alumno,capacitador',
            'status' => 'sometimes|required|in:active,inactive',
            'phone_number' => 'sometimes|nullable|string|max:13',
            'birthday_date' => 'sometimes|nullable|date|before:today',
            'country' => 'sometimes|nullable|string|max:255',
            'city' => 'sometimes|nullable|string|max:255',
            'address' => 'sometimes|nullable|string|max:255',
            'document_type' => 'sometimes|nullable|string|max:20',
            'document_number' => 'sometimes|nullable|string|max:50|unique:users,document_number,'.$this->user->id,
            'gender' => 'sometimes|nullable|in:M,F',
            'photo' => 'sometimes|nullable|string|max:255', 
            'speciality' => 'sometimes|nullable|string|max:255',
            'biography' => 'sometimes|nullable|string',
        ];
    }
}
