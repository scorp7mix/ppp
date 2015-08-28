<?php

require __DIR__ . '/../config/conf_db.php';

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if (mysqli_connect_errno()) {
    echo "Can't connect to database: " . mysqli_connect_error();
}

mysqli_query($db, "SET NAMES utf8");

function dbQuery($db, $query)
{
    $dbResponse = mysqli_query($db, $query);

    $dbResult = [];

    while ($dbRow = mysqli_fetch_assoc($dbResponse)) {
        $dbResult[] = $dbRow;
    }

    return $dbResult;
}

function dbSelect($db, $fields, $table, $conditions = '')
{
    $dbResponse = mysqli_query($db, "SELECT " . $fields . " FROM " . $table . " " . $conditions);

    $dbResult = [];

    while ($dbRow = mysqli_fetch_assoc($dbResponse)) {
        $dbResult[] = $dbRow;
    }

    return $dbResult;
}

function dbInsert($db, $table, $params)
{
    $arrayKeys = [];
    $arrayValues = [];

    foreach ($params as $key => $value) {
        $arrayKeys[] = $key;
        $arrayValues[] = "'" . $value . "'";
    }

    $stringKeys = implode(',', $arrayKeys);
    $stringValues = implode(',', $arrayValues);

    mysqli_query($db, "INSERT " . "INTO " . $table . "(" . $stringKeys . ") VALUES (" . $stringValues . ")");

    $dbResult = mysqli_affected_rows($db);

    return $dbResult;
}

function dbUpdate($db, $table, $params, $conditions)
{
    $arrayPairs = [];

    foreach ($params as $key => $value) {
        $arrayPairs[] = $key . "='" . $value . "'";
    }

    $stringPairs = implode(',', $arrayPairs);

    mysqli_query($db, "UPDATE " . $table . " SET " . $stringPairs . " " . $conditions);

    $dbResult = mysqli_affected_rows($db);

    return $dbResult;
}

function dbDelete($db, $table, $conditions)
{
    mysqli_query($db, "DELETE " . "FROM " . $table . " " . $conditions);

    $dbResult = mysqli_affected_rows($db);

    return $dbResult;
}
