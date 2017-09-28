<?php

namespace Modules\Localization\DataTables;

use Modules\Localization\Entities\District;
use Modules\Localization\Repositories\DistrictRepository;
use Nwidart\Modules\Facades\Module;
use Yajra\Datatables\Services\DataTable;

class DistrictDataTable extends DataTable
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
            ->addColumn('city', function (District $district) {
                return $district->city->name;
            })
            ->addColumn('action', function ($district) {
                $action_buttons =   \Html::decode(link_to(
                    route('admin.localization.district.edit',
                        [$district->id]),
                    '<i class="fa fa-pencil"></i>',
                    ['class'=>'btn btn-default btn-flat']
                ));
                $action_buttons .= \Html::decode(\Form::button(
                    '<i class="fa fa-trash"></i>',
                    [
                        "data-toggle"        => "modal",
                        "data-action-target" => route("admin.localization.district.destroy", [$district->id]),
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
        $query = app(DistrictRepository::class)->query();
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
            ->addAction(['title'=>'İşlemler'])
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
            'city' => ['name' => 'city', 'data' => 'city', 'title' => 'Şehir'],
            'county' => ['name' => 'county', 'data' => 'county', 'title' => 'İlçe'],
            'district' => ['name' => 'district', 'data' => 'district', 'title' => 'Bölge'],
            'neighborhood' => ['name' => 'neighborhood', 'data' => 'neighborhood', 'title' => 'Mahalle/Köy']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'districts_' . time();
    }

    protected function getBuilderParameters()
    {
        $locale = locale();
        return [
            'order'   => [[0, 'asc']],
            'searchDelay' => 750,
            'language' => [
                'url' => Module::asset("core:js/vendor/datatables/{$locale}.json")
            ],
            'buttons' => [
                'create',
                'export',
                'print',
                'reset',
                'reload',
            ],
        ];
    }
}
