<?php

namespace Modules\Localization\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use Translatable;

    protected $table = 'localization__countries';
    public $translatedAttributes = ['name'];
    protected $fillable = ['iso', 'name'];

    public function scopeWithTranslation($query)
    {
        return $query->leftJoin('localization__country_translations as lang', 'lang.country_id', '=', 'localization__countries.id');
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
