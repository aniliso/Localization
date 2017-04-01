<?php

namespace Modules\Localization\Repositories\Cache;

use Modules\Localization\Repositories\DistrictRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheDistrictDecorator extends BaseCacheDecorator implements DistrictRepository
{
    /**
     * CacheDistrictDecorator constructor.
     * @param DistrictRepository $district
     */
    public function __construct(DistrictRepository $district)
    {
        parent::__construct();
        $this->entityName = 'localization.districts';
        $this->repository = $district;
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

    /**
     * @return mixed
     */
    public function getCountiesByCityId($city_id)
    {
        return $this->cache
            ->tags($this->entityName, 'global')
            ->remember("{$this->locale}.{$this->entityName}.allCounties.{$city_id}", $this->cacheTime,
                function () use ($city_id) {
                    return $this->repository->getCountiesByCityId($city_id);
                }
            );
    }
}
