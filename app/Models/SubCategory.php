<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'sub_categorys';
    protected $fillable = [
        'category_id',
        'name'
    ];
    public function subsubcategory()
    {
        return $this->hasMany(SubSubCategory::class);
    }
}
