<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePaymentRequest extends FormRequest
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
            'enrollment_id'=>'sometimes|required|exists:enrollments,id',
            'transaction_code'=>'sometimes|required|string|max:255',
            'voucher'=>'sometimes|required|string|max:255',
            'amount'=>'sometimes|required|numeric|min:0',
            'type'=>'sometimes|rquired|in:transferencia,yape,plin,tarjeta',
            'status'=>'sometimes|required|in:pending,completed,failed',
            'payment_date'=>'sometimes|required|date'
        ];
    }
}
