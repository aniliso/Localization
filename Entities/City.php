<?php

namespace Modules\Localization\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use Translatable;

    protected $table = 'localization__cities';
    public $translatedAttributes = ['name'];
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
