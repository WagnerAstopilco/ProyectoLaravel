<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserEvaluationResource extends JsonResource
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
            'user_id' => $this->user_id,
            'evaluation_id' => $this->evaluation_id,
            'attempt_number' => $this->attempt_number,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'score' => $this->score,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'user' => new UserResource($this->whenLoaded('user')),
            'evaluation' => new EvaluationResource($this->whenLoaded('evaluation')),
            'userAnswers' => UserAnswerResource::collection($this->whenLoaded('userAnswers')),

        ];
    }
}
