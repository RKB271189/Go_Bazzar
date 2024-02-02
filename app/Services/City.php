<?php

namespace App\Services;

use App\Models\City as ModelsCity;
use App\Services\Contracts\ServiceRepository;

final class City extends ServiceRepository
{
    public function __construct(private ModelsCity $city)
    {
        parent::__construct($city);
    }
}
