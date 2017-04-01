<?php

namespace Modules\Localization\Entities;

use Illuminate\Database\Eloquent\Model;

class CountryTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
    protected $table = 'localization__country_translations';
}
