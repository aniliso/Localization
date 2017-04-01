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

    public function findDistricts($city_id)
    {
        return $this->model->whereHas('districts', function(Builder $query) use ($city_id) {
            $query->where('city_id', $city_id);
        })->with('districts')->first()->districts()->get();
    }

    public function query()
    {
        return $this->model->with('country');
    }
}
