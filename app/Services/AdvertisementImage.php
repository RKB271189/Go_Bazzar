<?php

namespace App\Services;

use App\Models\AdvertisementImage as ModelsAdvertisementImage;
use App\Services\Contracts\ServiceRepository;
use Illuminate\Database\Eloquent\Collection;

final class AdvertisementImage extends ServiceRepository
{
    public function __construct(private ModelsAdvertisementImage $advertisementImage)
    {
        parent::__construct($advertisementImage);
    }
    public function getImagesByAdvertisementId(int $advertisementId): ?Collection
    {
        $collection = $this->advertisementImage->where('advertisement_id', $advertisementId)->get();
        return $collection ? $collection : null;
    }
}
