<?php

namespace Modules\Localization\Repositories\Cache;

use Modules\Localization\Repositories\CountryRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCountryDecorator extends BaseCacheDecorator implements CountryRepository
{
    public function __construct(CountryRepository $country)
    {
        parent::__construct();
        $this->entityName = 'localization.countries';
        $this->repository = $country;
    }
}
