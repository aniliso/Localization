<?php

namespace Modules\Localization\Composer\Backend;


use Illuminate\Contracts\View\View;
use Modules\Localization\Repositories\CityRepository;

class CityComposer
{
    private $city;

    public function __construct(CityRepository $city)
    {
        $this->city = $city;
    }

    public function compose(View $view)
    {
        $cities = $this->city->all()->pluck('name', 'id');
        $view->with('cityLists', $cities);
    }
}