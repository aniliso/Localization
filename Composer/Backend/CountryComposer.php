<?php

namespace Modules\Localization\Composer\Backend;

use Illuminate\Contracts\View\View;
use Modules\Localization\Repositories\CountryRepository;

class CountryComposer
{
    private $country;

    public function __construct(CountryRepository $country)
    {
        $this->country = $country;
    }

    public function compose(View $view)
    {
        $countries = $this->country->all()->sortBy('id')->pluck('name', 'id')->toArray();
        $view->with('countryLists', $countries);
    }
}