<?php

namespace Modules\Localization\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Localization\Composer\Backend\CityComposer;
use Modules\Localization\Composer\Backend\CountryComposer;

class LocalizationServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();

        view()->composer([
            'localization::admin.cities.create',
            'localization::admin.cities.edit',
            'localization::admin.districts.create'
        ],
        CountryComposer::class
        );

        view()->composer([
            'localization::admin.districts.create'
        ],
            CityComposer::class
        );
    }

    public function boot()
    {
        $this->publishConfig('localization', 'permissions');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Localization\Repositories\CountryRepository',
            function () {
                $repository = new \Modules\Localization\Repositories\Eloquent\EloquentCountryRepository(new \Modules\Localization\Entities\Country());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Localization\Repositories\Cache\CacheCountryDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Localization\Repositories\CityRepository',
            function () {
                $repository = new \Modules\Localization\Repositories\Eloquent\EloquentCityRepository(new \Modules\Localization\Entities\City());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Localization\Repositories\Cache\CacheCityDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Localization\Repositories\DistrictRepository',
            function () {
                $repository = new \Modules\Localization\Repositories\Eloquent\EloquentDistrictRepository(new \Modules\Localization\Entities\District());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Localization\Repositories\Cache\CacheDistrictDecorator($repository);
            }
        );
// add bindings



    }
}
