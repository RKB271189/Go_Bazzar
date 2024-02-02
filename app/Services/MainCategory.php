<?php

namespace App\Services;

use App\Models\MainCategory as ModelsMainCategory;
use App\Services\Contracts\ServiceRepository;

final class MainCategory extends ServiceRepository
{
    public function __construct(private ModelsMainCategory $mainCategory)
    {
        parent::__construct($mainCategory);
    }
}
