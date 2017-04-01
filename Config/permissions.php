<?php

return [
    'localization.countries' => [
        'index'   => 'localization::countries.list resource',
        'create'  => 'localization::countries.create resource',
        'edit'    => 'localization::countries.edit resource',
        'destroy' => 'localization::countries.destroy resource',
    ],
    'localization.cities'    => [
        'index'     => 'localization::cities.list resource',
        'districts' => 'localization::cities.district resource',
        'create'    => 'localization::cities.create resource',
        'edit'      => 'localization::cities.edit resource',
        'destroy'   => 'localization::cities.destroy resource',
    ],
    'localization.districts' => [
        'index'   => 'localization::districts.list resource',
        'create'  => 'localization::districts.create resource',
        'edit'    => 'localization::districts.edit resource',
        'destroy' => 'localization::districts.destroy resource',
    ]
];

