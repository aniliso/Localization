<?php

namespace Modules\Localization\Repositories\Cache;

use Modules\Localization\Repositories\CityRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCityDecorator extends BaseCacheDecorator implements CityRepository
{
    public function __construct(CityRepository $city)
    {
        parent::__construct();
        $this->entityName = 'localization.cities';
        $this->repository = $city;
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return $this->cache
            ->tags($this->entityName, 'global')
            ->remember("{$this->locale}.{$this->entityName}.query", $this->cacheTime,
                function () {
                    return $this->repository->query();
                }
            );
    }
}
