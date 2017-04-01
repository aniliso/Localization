<?php

namespace Modules\Localization\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Localization\DataTables\DistrictDataTable;
use Modules\Localization\Entities\District;
use Modules\Localization\Repositories\DistrictRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class DistrictController extends AdminBaseController
{
    /**
     * @var DistrictRepository
     */
    private $district;
    /**
     * @var DistrictDataTable
     */
    private $districtDataTable;

    public function __construct(DistrictRepository $district, DistrictDataTable $districtDataTable)
    {
        parent::__construct();

        $this->district = $district;
        $this->districtDataTable = $districtDataTable;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return $this->districtDataTable->render('localization::admin.districts.index');

        //return view('localization::admin.districts.index', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('localization::admin.districts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->district->create($request->all());

        return redirect()->route('admin.localization.district.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('localization::districts.title.districts')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  District $district
     * @return Response
     */
    public function edit(District $district)
    {
        return view('localization::admin.districts.edit', compact('district'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  District $district
     * @param  Request $request
     * @return Response
     */
    public function update(District $district, Request $request)
    {
        $this->district->update($district, $request->all());

        return redirect()->route('admin.localization.district.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('localization::districts.title.districts')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  District $district
     * @return Response
     */
    public function destroy(District $district)
    {
        $this->district->destroy($district);

        return redirect()->route('admin.localization.district.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('localization::districts.title.districts')]));
    }
}
