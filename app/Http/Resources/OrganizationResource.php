<?php

namespace App\Http\Resources;

use App\Models\Organization;
use Illuminate\Http\Resources\Json\JsonResource;

class OrganizationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        /** @var User $this */
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'email'     => $this->email,
            'city'      => $this->city,
        ];
    }
}
