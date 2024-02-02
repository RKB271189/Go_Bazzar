<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    protected  $table = 'advertisements';

    protected  $fillable = [
        'profile_id',
        'province_id',
        'city_id',
        'sub_category_id',
        'thumb_nail',
        'title',
        'description',
        'expiry_date',
        'address',
        'price',
        'is_available',
        'is_sold'
    ];
    public function getThumbNailAttribute()
    {
        if (array_key_exists('thumb_nail', $this->attributes)) {
            if ($this->attributes['thumb_nail'] != null)
                return '/storage/' . $this->attributes['thumb_nail'];
            return '/images/no-image.jpg';
        }
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
    public function image()
    {
        return $this->hasMany(AdvertisementImage::class);
    }
}
