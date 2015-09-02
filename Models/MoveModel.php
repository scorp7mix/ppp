<?php

namespace Models;

use Core\Model;

/**
 * Class MoveModel
 * @property $id
 * @property $date
 * @property $id_consignment
 * @property $id_from
 * @property $id_to
 * @property $id_type
 * @property $qty_from
 * @property $qty_to
 * @property $qty_t
 * @property $kr
 * @property $parts
 */
class MoveModel extends Model
{
    protected static $schema = [
        'table'     => 'move',
        'fields'    => [
            'id',
            'date',
            'id_consignment',
            'id_from',
            'id_to',
            'id_type',
            'qty_from',
            'qty_to',
            'qty_t',
            'kr',
            'parts',
        ],
        'joins'     => [
            [
                'table'     => 'consignment',
                'as'        => 'consignment',
                'on'        => 'consignment.id = move.id_consignment',
                'fields'    => [
                    'name'
                ]
            ],
            [
                'table'     => 'paint',
                'as'        => 'paint',
                'on'        => 'paint.id = consignment.id_paint',
                'fields'    => [
                    'name'
                ]
            ],
            [
                'table'     => 'place',
                'as'        => 'place_from',
                'on'        => 'place_from.id = move.id_from',
                'fields'    => [
                    'name'
                ]
            ],
            [
                'table'     => 'warehouse',
                'as'        => 'warehouse_from',
                'on'        => 'warehouse_from.id = place_from.id_warehouse',
                'fields'    => [
                    'name'
                ]
            ],
            [
                'table'     => 'place',
                'as'        => 'place_to',
                'on'        => 'place_to.id = move.id_to',
                'fields'    => [
                    'name'
                ]
            ],
            [
                'table'     => 'warehouse',
                'as'        => 'warehouse_to',
                'on'        => 'warehouse_to.id = place_to.id_warehouse',
                'fields'    => [
                    'name'
                ]
            ],
            [
                'table'     => 'type',
                'as'        => 'type',
                'on'        => 'type.id = move.id_type',
                'fields'    => [
                    'name'
                ]
            ],
        ]
    ];
}