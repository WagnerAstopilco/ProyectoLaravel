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
            'names' => 'required|string|max:255',
            'last_names' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required|in:admin,comercial,supervisor,alumno,capacitador',
            'status' => 'required|in:active,inactive',
            'phone_number' => 'nullable|string|max:13',
            'birthday_date' => 'nullable|date|before:' . now()->subYears(18)->format('Y-m-d'),
            'country' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'document_type' => 'nullable|string|max:20',
            'document_number' => 'nullable|string|max:50|unique:users,document_number',
            'gender' => 'nullable|in:M,F',
            'photo' => 'nullable|string|max:255', 
            'speciality' => 'nullable|string|max:255',
            'biography' => 'nullable|string',
        ];
    }
}
