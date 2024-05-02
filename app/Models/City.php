<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = 'citys';
    public $timestamps = false;
    protected $fillable = [
        'province_id',
        'name'
    ];
    public function advertisements(){
        return $this->hasMany(Advertisement::class);
    }
}
