<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
            'evaluation_id' => $this->evaluation_id,
            'type' => $this->type,
            'question_text' => $this->question_text,
            'weight' => $this->weight,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,


            'evaluation' => new EvaluationResource($this->whenLoaded('evaluation')),
            'options' => OptionResource::collection($this->whenLoaded('options')),
            'user_answers' => UserAnswerResource::collection($this->whenLoaded('userAnswers')),
        ];
    }
}
