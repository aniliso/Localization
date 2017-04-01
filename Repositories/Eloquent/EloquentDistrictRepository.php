<?php

namespace Modules\Localization\Repositories\Eloquent;

use Modules\Localization\Repositories\DistrictRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentDistrictRepository extends EloquentBaseRepository implements DistrictRepository
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return $this->model->with('city')->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->model->with('city');
    }

    /**
     * @return mixed
     */
    public function getCountiesByCityId($city_id)
    {
        return $this->model->groupDistrict($city_id)->get();
    }
}
