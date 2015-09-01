<?php

namespace Models;

use Core\Model;

/**
 * Class PaintModel
 * @property $id
 * @property $name
 */
class PaintModel extends Model
{
    protected static $schema = [
        'table'     => 'paint',
        'fields'    => [
            'id',
            'name',
        ],
    ];
}