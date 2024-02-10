<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BusinessResource extends JsonResource
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
            'postal_code' => $this->profile->postal_code,
            'contact_no' => $this->profile->contact_no,
            'city' => $this->city->name,
            'name' => $this->profile->first_name . ' ' . $this->profile->last_name,
            'sub_category_id' => $this->sub_category_id,
            'sub_category' => $this->subcategory->name,
            'sub_sub_category_id' => $this->sub_sub_category_id,
            'sub_sub_category' => $this->subsubcategory->name,
            'title' => $this->title,
            'address' => $this->address,
            'business_picture' => $this->businessPicture,
            'business_email' => $this->business_email,
            'business_no' => $this->business_no,
            'created_at' => date('d-m-Y', strtotime($this->created_at))
        ];
        return $data;
        //return parent::toArray($request);
    }
}
