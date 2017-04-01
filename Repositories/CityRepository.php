<?php

namespace Modules\Localization\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface CityRepository extends BaseRepository
{
    public function findDistricts($city_id);

    public function query();
}
