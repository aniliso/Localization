<?php

namespace Modules\Localization\Entities;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'localization__districts';
    protected $fillable = ['county', 'district', 'neighborhood', 'postcode'];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function scopeGroupDistrict($query, $city_id)
    {
        return $query->where('city_id', $city_id)->groupBy('county');
    }
}
