<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'id' => $this->id,
            'profile_id' => $this->profile_id,
            'province_id' => $this->province_id,
            'city_id' => $this->city_id,
            'province' => $this->province->name,
            'postal_code' => $this->province->postal_code,
            'contact_no' => $this->province->contact_no,
            'city' => $this->city->name,
            'name' => $this->profile->first_name . ' ' . $this->profile->last_name,
            'sub_category_id' => $this->sub_category_id,
            'title' => $this->title,
            'description' => $this->description,
            'address' => $this->address,
            'thumb_nail' => $this->thumbNail,
            'expiry_date' => date('Y-m-d', strtotime($this->expiry_date)),
            'is_available' => $this->is_available,
            'is_sold' => $this->is_sold,
            'urgent' => false,
            'price' => $this->price,
            'created_at' => date('d-m-Y', strtotime($this->created_at))
        ];
        if ($this->relationLoaded('image')) {
            $data['image'] = $this->image;
        }
        //return parent::toArray($request);
        return $data;
    }
}
