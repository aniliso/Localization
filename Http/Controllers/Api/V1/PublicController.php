<?php

namespace Modules\Localization\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Localization\Entities\Country;
use Modules\Localization\Repositories\CityRepository;
use Modules\Localization\Repositories\CountryRepository;
use Modules\Localization\Repositories\DistrictRepository;

class PublicController extends BasePublicController
{
    private $country;
    private $city;
    private $district;

    private $data = [];
    private $error = false;

    public function __construct(
        CountryRepository $country,
        CityRepository $city,
        DistrictRepository $district
    )
    {
        parent::__construct();
        $this->country = $country;
        $this->city = $city;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('localization::index');
    }

    public function countries()
    {
        $this->data = $this->country->all()->sortBy('id')->pluck('name', 'id');
        $this->error = count($this->data) > 0  ? true : false;
        return \Response::json([
           'success' => $this->error,
           'data'    => $this->data
        ]);
    }

    public function cities(Request $request)
    {
        $this->data = collect($this->country->find($request->get('id'))->cities)->sortBy('id')->pluck('name', 'id');
        $this->error = count($this->data) > 0  ? true : false;
        return \Response::json([
           'success' => $this->error,
           'data'    => $this->data
        ]);
    }
}
