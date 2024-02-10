<?php

namespace App\Services;

use App\Models\Business as ModelsBusiness;
use App\Services\Contracts\ServiceRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

final class Business extends ServiceRepository
{
    public function __construct(private ModelsBusiness $business)
    {
        parent::__construct($business);
    }
    public function getBusinessByUserId(int $profileId): ?Collection
    {
        $collection = $this->business->with('province')->with('city')->with('profile')->where('profile_id', $profileId)
            ->with('subcategory')->with('subsubcategory')
            ->get();
        return $collection ? $collection : null;
    }
    public function getCollectionById(int $id): Model
    {
        $collection = $this->business->with('province')->with('city')->with('profile')->where('id', $id)->first();
        return $collection ? $collection : null;
    }
}
