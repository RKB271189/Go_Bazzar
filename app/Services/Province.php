<?php

namespace App\Services;

use App\Models\Province as ModelsProvince;
use App\Services\Contracts\ServiceRepository;
use Illuminate\Database\Eloquent\Collection;


final class Province extends ServiceRepository
{
    public function __construct(private ModelsProvince $province)
    {
        parent::__construct($province);
    }
    public function getCollection(int $limit = 0): Collection
    {
        $collection = $this->province->with('city')->get();
        return $collection;
    }
}
