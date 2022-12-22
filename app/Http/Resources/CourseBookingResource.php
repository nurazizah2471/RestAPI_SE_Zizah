<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseBookingResource extends JsonResource
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
            'course' => $this->course,
            'tutor' => $this->course->tutor,
            'tutor_user' => $this->course->tutor->user,
            'skill' => $this->course->skill,
            'transaction' => $this->transaction,
            'orphanage' => $this->orphanage,
            'orphanage_user' => $this->orphanage->user,
            'status' => $this->status,
            'member_sum' => $this->member_sum,
            'location' => $this->location,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
