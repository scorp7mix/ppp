<?php

require_once __DIR__ . '/../core/db.php';

function paintIndex($db)
{
    return dbSelect($db, '*', 'paint');
}

function paintShow($db, $id)
{
    return dbSelect($db, '*', 'paint', 'WHERE id=' . $id)[0];
}

function paintEdit($db, $id, $params)
{
    return dbUpdate($db, 'paint', $params, 'WHERE id=' . $id);
}

function paintAdd($db, $params)
{
    return dbInsert($db, 'paint', $params);
}

function paintDelete($db, $id)
{
    return dbDelete($db, 'paint', 'WHERE id=' . $id);
}
