<?php

namespace Modules\Localization\Repositories\Eloquent;

use Modules\Localization\Repositories\CountryRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentCountryRepository extends EloquentBaseRepository implements CountryRepository
{
//    public function all()
//    {
//        return $this->model->with('translations')->get()->sortBy('id');
//    }
}
