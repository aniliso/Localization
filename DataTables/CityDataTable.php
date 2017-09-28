<?php namespace Modules\Localization\DataTables;

use Modules\Localization\Entities\City;
use Modules\Localization\Repositories\CityRepository;
use Nwidart\Modules\Facades\Module;
use Yajra\Datatables\Services\DataTable;

class CityDataTable extends DataTable
{
    protected $actions = ['print', 'excel'];
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
            ->addColumn('action', function(City $city) {
                $action_buttons =   \Html::decode(link_to(
                    route('admin.localization.city.edit',
                        [$city->id]),
                    '<i class="fa fa-pencil"></i>',
                    ['class'=>'btn btn-default btn-flat']
                ));
                $action_buttons .= \Html::decode(\Form::button(
                    '<i class="fa fa-trash"></i>',
                    [
                        "data-toggle"        => "modal",
                        "data-action-target" => route("admin.localization.city.destroy", [$city->id]),
                        "data-target"        => "#modal-delete-confirmation",
                        "class"              => "btn btn-danger btn-flat"
                    ]
                ));
                return $action_buttons;
            })
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
                'excel'
            ],
            'dom' => 'Bfrtip'
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
