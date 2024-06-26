<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $table = 'user_profiles';

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'province_id',
        'city_id',
        'contact_no',
        'postal_code',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function advertisements()
    {
        return $this->hasMany(Advertisement::class);
    }
}
