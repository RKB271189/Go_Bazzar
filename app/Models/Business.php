<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    protected  $table = 'businesses';

    protected  $fillable = [
        'profile_id',
        'province_id',
        'city_id',
        'sub_category_id',
        'sub_sub_category_id',
        'business_picture',
        'business_email',
        'business_no',
        'title',
        'address',
        'is_approved'
    ];
    public function getBusinessPictureAttribute()
    {
        if (array_key_exists('business_picture', $this->attributes)) {
            if ($this->attributes['business_picture'] != null)
                return '/storage/' . $this->attributes['business_picture'];
            return '/images/no-image.jpg';
        }
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }
    public function subsubcategory()
    {
        return $this->belongsTo(SubSubCategory::class, 'sub_sub_category_id');
    }
    public function profile()
    {
        return $this->belongsTo(UserProfile::class);
    }
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
