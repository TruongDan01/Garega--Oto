<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'branch_id' => $this->branch_id,
            'name' => $this->name,
            'avatar' => $this->avatar,
            'status' => $this->status,
//            'phone' => $this->phone,
//            'email' => $this->email,
//            'role' => $this->role,
        ];
    }
}
