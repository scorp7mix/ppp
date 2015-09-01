<?php

namespace Models;

use Core\Model;

/**
 * Class PlaceModel
 * @property $id
 * @property $name
 * @property $id_warehouse
 */
class PlaceModel extends Model
{
    protected static $schema = [
        'table'     => 'place',
        'fields'    => [
            'id',
            'name',
            'id_warehouse',
        ],
        'joins'     => [
            [
                'table'     => 'warehouse',
                'as'        => 'warehouse',
                'on'        => 'warehouse.id = place.id_warehouse',
                'fields'    => [
                    'name'
                ]
            ]
        ]
    ];
}