<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisementImage extends Model
{
    use HasFactory;

    protected $table = 'advertisement_images';

    protected $fillable = [
        'advertisement_id',
        'image'
    ];
    public function getImageAttribute()
    {
        if (array_key_exists('image', $this->attributes)) {
            if ($this->attributes['image'] != null)
                return '/storage/' . $this->attributes['image'];
        }
    }
}
