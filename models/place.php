<?php

require_once __DIR__ . '/../core/db.php';

function placeIndex($db)
{
    return dbQuery($db, 'SELECT p.id, p.name, p.id_warehouse, w.name AS warehouse ' .
                        'FROM place AS p ' .
                        'LEFT JOIN warehouse AS w ON w.id = p.id_warehouse');
}

function placeShow($db, $id)
{
    return dbQuery($db, 'SELECT p.id, p.name, w.name AS warehouse ' .
                        'FROM place AS p ' .
                        'LEFT JOIN warehouse AS w ON w.id = p.id_warehouse ' .
                        'WHERE p.id=' . $id)[0];
}

function placeEdit($db, $id, $params)
{
    return dbUpdate($db, 'place', $params, 'WHERE id=' . $id);
}

function placeAdd($db, $params)
{
    return dbInsert($db, 'place', $params);
}

function placeDelete($db, $id)
{
    return dbDelete($db, 'place', 'WHERE id=' . $id);
}
