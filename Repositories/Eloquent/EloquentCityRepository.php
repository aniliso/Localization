<?php

namespace Modules\Localization\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Modules\Localization\Repositories\CityRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentCityRepository extends EloquentBaseRepository implements CityRepository
{
    public function all()
    {
        return $this->model->with(['translations', 'country'])->get();
    }

    public function query()
    {
        return $this->model->with('country');
    }
}
