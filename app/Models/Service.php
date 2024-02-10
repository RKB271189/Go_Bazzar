<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected  $table = 'services';

    protected  $fillable = [
        'profile_id',
        'province_id',
        'city_id',
        'sub_category_id',
        'service_picture',
        'service_email',
        'service_no',
        'title',
        'description',
        'address',
        'is_approved'
    ];
    public function getServicePictureAttribute()
    {
        if (array_key_exists('service_picture', $this->attributes)) {
            if ($this->attributes['service_picture'] != null)
                return '/storage/' . $this->attributes['service_picture'];
            return '/images/avatar.png';
        }
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
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
