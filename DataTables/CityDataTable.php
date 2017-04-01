<?php namespace Modules\Localization\DataTables;

use Modules\Localization\Entities\City;
use Modules\Localization\Repositories\CityRepository;
use Nwidart\Modules\Facades\Module;
use Yajra\Datatables\Services\DataTable;

class CityDataTable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('country', function(City $city) {
                return $city->country->name;
            })
            ->addColumn('action', 'path.to.action.view')
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = app(CityRepository::class)->query();
        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->ajax('')
            ->addAction(['width' => '80px'])
            ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'country' => ['name' => 'country.name', 'data' => 'country', 'title' => 'Ülke'],
            'name'    => ['name' => 'name', 'data' => 'name', 'title' => 'Şehir'],
        ];
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getBuilderParameters()
    {
        $locale = locale();
        return [
            'order'       => [[0, 'asc']],
            'searchDelay' => 750,
            'language'    => [
                'url' => Module::asset("core:js/vendor/datatables/{$locale}.json")
            ],
            'buttons'     => [
                'create',
                'export',
                'print',
                'reset',
                'reload',
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'cities_' . time();
    }
}
