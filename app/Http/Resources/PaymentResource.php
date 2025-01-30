<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'enrollment_id' => $this->enrollment_id,
            'transaction_code' => $this->transaction_code,
            'voucher' => $this->voucher,
            'amount' => $this->amount,
            'type' => $this->type,
            'status' => $this->status,
            'payment_date' => $this->payment_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'enrollment' => new EnrollmentResource($this->whenLoaded('enrollment')),
        ];
    }
}
