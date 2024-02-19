<?php

namespace App\Services;

use App\Models\SubCategory as ModelsSubCategory;
use App\Services\Contracts\ServiceRepository;
use Illuminate\Database\Eloquent\Collection;

final class SubCategory extends ServiceRepository
{
    public function __construct(private ModelsSubCategory $subCategory)
    {
        parent::__construct($subCategory);
    }
    public function getCollection(int $limit = 0): Collection
    {
        return $this->subCategory->with('subsubcategory')->get();
    }
    public function getSubCategoryByMainId(int $mainId): Collection
    {
        return $this->subCategory->where('category_id', $mainId)->get();
    }
}
