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
            'name' => $this->user_id,
            'phone' => $this->phone,
            'email' => $this->email,
            'avatar' => $this->avatar,
            'role' => $this->role,
            'status' => $this->status,
            'branch' => $this->branch_id,
        ];
    }
}
