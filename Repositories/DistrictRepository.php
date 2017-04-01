<?php

namespace Modules\Localization\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface DistrictRepository extends BaseRepository
{
    /**
     * @return mixed
     */
    public function query();

    /**
     * @return mixed
     */
    public function getCountiesByCityId($city_id);
}
