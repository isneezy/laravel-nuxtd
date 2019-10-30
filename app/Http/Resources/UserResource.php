<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'avatar' => get_gravatar($this->resource->email),
            'email' => $this->resource->email,
            'role_id' => $this->resource->role_id,
            'role' => $this->resource->role,
            'has_verified_email' => $this->resource->hasVerifiedEmail(),
            'updated_at' => $this->resource->updated_at,
            'created_at' => $this->resource->created_at
        ];
    }
}
