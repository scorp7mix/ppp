<?php

require_once __DIR__ . '/../core/db.php';

function consignmentIndex($db)
{
    return dbQuery($db, 'SELECT c.id, c.name, p.name AS paint, DATE_FORMAT(c.date_of_end, "%d.%m.%Y") AS date ' .
                        'FROM consignment AS c ' .
                        'LEFT JOIN paint AS p ON p.id = c.id_paint');
}

function consignmentShow($db, $id)
{
    return dbQuery($db, 'SELECT c.id, c.name, p.name AS paint, DATE_FORMAT(c.date_of_end, "%d.%m.%Y") AS date ' .
                        'FROM consignment AS c ' .
                        'LEFT JOIN paint AS p ON p.id = c.id_paint ' .
                        'WHERE c.id=' . $id)[0];
}

function consignmentEdit($db, $id, $params)
{
    return dbUpdate($db, 'consignment', $params, 'WHERE id=' . $id);
}

function consignmentAdd($db, $params)
{
    return dbInsert($db, 'consignment', $params);
}

function consignmentDelete($db, $id)
{
    return dbDelete($db, 'consignment', 'WHERE id=' . $id);
}
