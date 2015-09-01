<?php

namespace Models;

use Core\Model;

/**
 * Class ConsignmentModel
 * @property $id
 * @property $name
 * @property $id_paint
 * @property $date_of_end
 */
class ConsignmentModel extends Model
{
    protected static $schema = [
        'table'     => 'consignment',
        'fields'    => [
            'id',
            'name',
            'id_paint',
            'date_of_end'
        ],
        'joins'     => [
            [
                'table'     => 'paint',
                'as'        => 'paint',
                'on'        => 'paint.id = consignment.id_paint',
                'fields'    => [
                    'name'
                ]
            ]
        ]
    ];
}