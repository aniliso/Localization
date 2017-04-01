<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/localization/zone'], function (Router $router) {
    $router->bind('country', function ($id) {
        return app('Modules\Localization\Repositories\CountryRepository')->find($id);
    });
    $router->get('countries', [
        'as' => 'admin.localization.country.index',
        'uses' => 'CountryController@index',
        'middleware' => 'can:localization.countries.index'
    ]);
    $router->get('countries/create', [
        'as' => 'admin.localization.country.create',
        'uses' => 'CountryController@create',
        'middleware' => 'can:localization.countries.create'
    ]);
    $router->post('countries', [
        'as' => 'admin.localization.country.store',
        'uses' => 'CountryController@store',
        'middleware' => 'can:localization.countries.create'
    ]);
    $router->get('countries/{country}/edit', [
        'as' => 'admin.localization.country.edit',
        'uses' => 'CountryController@edit',
        'middleware' => 'can:localization.countries.edit'
    ]);
    $router->put('countries/{country}', [
        'as' => 'admin.localization.country.update',
        'uses' => 'CountryController@update',
        'middleware' => 'can:localization.countries.edit'
    ]);
    $router->delete('countries/{country}', [
        'as' => 'admin.localization.country.destroy',
        'uses' => 'CountryController@destroy',
        'middleware' => 'can:localization.countries.destroy'
    ]);
    $router->bind('city', function ($id) {
        return app('Modules\Localization\Repositories\CityRepository')->find($id);
    });
    $router->get('cities', [
        'as' => 'admin.localization.city.index',
        'uses' => 'CityController@index',
        'middleware' => 'can:localization.cities.index'
    ]);
    $router->get('cities/create', [
        'as' => 'admin.localization.city.create',
        'uses' => 'CityController@create',
        'middleware' => 'can:localization.cities.create'
    ]);
    $router->get('cities/{city}/districts', [
        'as' => 'admin.localization.city.districts',
        'uses' => 'CityController@districts',
        'middleware' => 'can:localization.cities.districts'
    ]);
    $router->post('cities', [
        'as' => 'admin.localization.city.store',
        'uses' => 'CityController@store',
        'middleware' => 'can:localization.cities.create'
    ]);
    $router->get('cities/{city}/edit', [
        'as' => 'admin.localization.city.edit',
        'uses' => 'CityController@edit',
        'middleware' => 'can:localization.cities.edit'
    ]);
    $router->put('cities/{city}', [
        'as' => 'admin.localization.city.update',
        'uses' => 'CityController@update',
        'middleware' => 'can:localization.cities.edit'
    ]);
    $router->delete('cities/{city}', [
        'as' => 'admin.localization.city.destroy',
        'uses' => 'CityController@destroy',
        'middleware' => 'can:localization.cities.destroy'
    ]);
    $router->bind('district', function ($id) {
        return app('Modules\Localization\Repositories\DistrictRepository')->find($id);
    });
    $router->get('districts', [
        'as' => 'admin.localization.district.index',
        'uses' => 'DistrictController@index',
        'middleware' => 'can:localization.districts.index'
    ]);
    $router->get('districts/create', [
        'as' => 'admin.localization.district.create',
        'uses' => 'DistrictController@create',
        'middleware' => 'can:localization.districts.create'
    ]);
    $router->post('districts', [
        'as' => 'admin.localization.district.store',
        'uses' => 'DistrictController@store',
        'middleware' => 'can:localization.districts.create'
    ]);
    $router->get('districts/{district}/edit', [
        'as' => 'admin.localization.district.edit',
        'uses' => 'DistrictController@edit',
        'middleware' => 'can:localization.districts.edit'
    ]);
    $router->put('districts/{district}', [
        'as' => 'admin.localization.district.update',
        'uses' => 'DistrictController@update',
        'middleware' => 'can:localization.districts.edit'
    ]);
    $router->delete('districts/{district}', [
        'as' => 'admin.localization.district.destroy',
        'uses' => 'DistrictController@destroy',
        'middleware' => 'can:localization.districts.destroy'
    ]);
// append



});
