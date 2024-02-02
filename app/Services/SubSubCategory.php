<?php

namespace App\Services;

use App\Models\SubSubCategory as ModelsSubSubCategory;
use App\Services\Contracts\ServiceRepository;

final class SubSubCategory extends ServiceRepository
{
    public function __construct(private ModelsSubSubCategory $subSubCategory)
    {
        parent::__construct($subSubCategory);
    }
}
