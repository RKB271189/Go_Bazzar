<?php

namespace App\Services;

use App\Models\Advertisement as ModelsAdvertisement;
use App\Services\Contracts\ServiceRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

final class Advertisement extends ServiceRepository
{
    public function __construct(private ModelsAdvertisement $advertisement)
    {
        parent::__construct($advertisement);
    }
    public function getAdvertisementByUserId(int $profileId): ?Collection
    {
        $collection = $this->advertisement->with('province')->with('city')->with('profile')->where('profile_id', $profileId)->get();
        return $collection ? $collection : null;
    }
    public function getCollectionById(int $id): Model
    {
        $collection = $this->advertisement->with('province')->with('city')->with('profile')->with('image')->where('id', $id)->first();
        return $collection ? $collection : null;
    }
    public function getCollectionByCategoryId(int $subCategoryId): ?Collection
    {
        $collection = $this->advertisement->with('province')->with('city')->with('profile')->where('sub_category_id', $subCategoryId)->get();
        return $collection ? $collection : null;
    }
}
