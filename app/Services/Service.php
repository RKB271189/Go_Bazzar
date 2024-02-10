<?php

namespace App\Services;

use App\Models\Service as ModelsService;
use App\Services\Contracts\ServiceRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

final class Service extends ServiceRepository
{
    public function __construct(private ModelsService $service)
    {
        parent::__construct($service);
    }
    public function getCollection(int $limit = 0): Collection
    {
        $collection = $this->service->with('province')->with('city')->get();
        return $collection ? $collection : null;
    }
    public function getServiceByUserId(int $profileId): ?Collection
    {
        $collection = $this->service->with('province')->with('city')->with('profile')
            ->with('subcategory')
            ->where('profile_id', $profileId)->get();
        return $collection ? $collection : null;
    }
    public function getCollectionById(int $id): Model
    {
        $collection = $this->service->with('province')->with('city')->with('profile')
            ->with('subcategory')
            ->where('id', $id)->first();
        return $collection ? $collection : null;
    }
}
