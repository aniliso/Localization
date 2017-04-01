<?php

namespace Modules\Localization\Entities;

use Illuminate\Database\Eloquent\Model;

class CityTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
    protected $table = 'localization__city_translations';
}
