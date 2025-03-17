<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
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
            'enrollment_id'=>'required|exists:enrollments,id',
            'transaction_code'=>'required|string|min:4|max:255',
            'voucher'=>'required|string|max:255',
            'amount'=>'required|numeric|gte:0',
            'type'=>'required|in:transferencia,yape,plin,tarjeta',
            'status'=>'required|in:pendiente,completada,fallida',
            'payment_date'=>'required|date'
        ];
    }
    public function attributes(){
        return[
            'enrollment_id'=>'matrícula',
            'transaction_code'=>'código de transacción',
            'voucher'=>'comprobante',
            'amount'=>'monto',
            'type'=>'tipo',
            'status'=>'estado',
            'payment_date'=>'fecha de pago',
        ];
    }
}
