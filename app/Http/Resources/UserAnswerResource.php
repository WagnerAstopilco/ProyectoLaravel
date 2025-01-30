<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserAnswerResource extends JsonResource
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
            'user_evaluation_id' => $this->user_evaluation_id,
            'question_id' => $this->question_id,
            'answer_text' => $this->answer_text,
            'is_correct' => $this->is_correct,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'user_evaluation' => new UserEvaluationResource($this->whenLoaded('userEvaluation')),
            'question' => new QuestionResource($this->whenLoaded('question')),
        ];
    }
}
