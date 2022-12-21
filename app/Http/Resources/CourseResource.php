<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'tutor' => $this->tutor,
            'tutor_user' => $this->tutor->user,
            'skill' => $this->skill,
            'description' => $this->description,
            'location' => $this->location,
            'is_online' => $this->is_online,
            'is_visit' => $this->is_visit,
            'maximum_member' => $this->maximum_member,
            'tool_price' => $this->tool_price,
            'tool_description' => $this->tool_description,
            'start_time' => $this->start_time,
            'day' => $this->day,
            'price_sum' => $this->price_sum,
            'hour_sum' => $this->hour_sum,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
