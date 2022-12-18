<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
        if (auth()->user()->user_type == 'Pengurus Panti') {
            return [
                'id' => $this->id,
                'name' => $this->name,
                'money' => $this->money,
                'profile_photo_path' => $this->profile_photo_path,
                'address' => $this->address,
                'orphanage' => $this->orphanage,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ];
        } elseif (auth()->user()->user_type == 'Tutor') {
            return [
                    'id' => $this->id,
                    'name' => $this->name,
                    'money' => $this->money,
                    'profile_photo_path' => $this->profile_photo_path,
                    'address' => $this->address,
                    'tutor' => $this->tutor,
                    'created_at' => $this->created_at,
                    'updated_at' => $this->updated_at,
                ];
        }
    }
}
