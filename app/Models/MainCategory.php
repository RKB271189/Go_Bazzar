<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    use HasFactory;
    protected $table = 'main_categorys';
    protected $fillable = [
        'name'
    ];
    public function subcategory()
    {
        return $this->hasMany(SubCategory::class);
    }
    public function subsubcategory()
    {
        return $this->hasMany(SubSubCategory::class);
    }
}
