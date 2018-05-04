<?php

namespace Modules\Localization\Entities;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'localization__cities';
    protected $fillable = ['name'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
