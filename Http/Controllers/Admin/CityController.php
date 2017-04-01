<?php

namespace Modules\Localization\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Localization\DataTables\CityDataTable;
use Modules\Localization\Entities\City;
use Modules\Localization\Repositories\CityRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class CityController extends AdminBaseController
{
    /**
     * @var CityRepository
     */
    private $city;
    /**
     * @var CityDataTable
     */
    private $cityDataTable;

    public function __construct(CityRepository $city, CityDataTable $cityDataTable)
    {
        parent::__construct();

        $this->city = $city;
        $this->cityDataTable = $cityDataTable;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return $this->cityDataTable->render('localization::admin.cities.index');

        //return view('localization::admin.cities.index', compact('cities'));
    }

    public function districts(City $city)
    {
        $districts = $this->city->findDistricts($city->id);

        return view('localization::admin.districts.index', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('localization::admin.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->city->create($request->all());

        return redirect()->route('admin.localization.city.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('localization::cities.title.cities')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  City $city
     * @return Response
     */
    public function edit(City $city)
    {
        return view('localization::admin.cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  City $city
     * @param  Request $request
     * @return Response
     */
    public function update(City $city, Request $request)
    {
        $this->city->update($city, $request->all());

        return redirect()->route('admin.localization.city.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('localization::cities.title.cities')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  City $city
     * @return Response
     */
    public function destroy(City $city)
    {
        $this->city->destroy($city);

        return redirect()->route('admin.localization.city.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('localization::cities.title.cities')]));
    }
}
