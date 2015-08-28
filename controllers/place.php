<?php

require_once __DIR__ . '/../models/place.php';
require_once __DIR__ . '/../core/template.php';

function action_place_index($db)
{
    $places = placeIndex($db);

    if (count($places)) {
        echo render(__DIR__ . '/../views/place/index.php', ['places' => $places]);
    } else {
        echo render(__DIR__ . '/../views/nothing_found.php');
    }
}

function action_place_edit($db)
{
    $id = $_GET['id'];

    if (isset($_POST['name']) && isset($_POST['warehouse'])) {
        $dbResult = placeEdit($db, $id, [
            'name' => $_POST['name'],
            'id_warehouse' => $_POST['warehouse'],
        ]);
        if ($dbResult) {
            header('Location: index.php?c=place&a=index');
        } else {
            header('Location: index.php?c=place&a=edit&id=' . $id);
        }
    }

    $place = placeShow($db, $id);

    echo render(__DIR__ . '/../views/place/edit.php', [
        'place' => $place,
    ]);
}

function action_place_new($db)
{
    if (isset($_POST['name']) && isset($_POST['warehouse'])) {
        $dbResult = placeAdd($db, [
            'name' => $_POST['name'],
            'id_warehouse' => $_POST['warehouse'],
        ]);
        if ($dbResult) {
            header('Location: index.php?c=place&a=index');
        } else {
            header('Location: index.php?c=place&a=new');
        }
    }

    echo render(__DIR__ . '/../views/place/new.php');
}

function action_place_delete($db)
{
    $id = $_GET['id'];

    placeDelete($db, $id);

    header('Location: index.php?c=place&a=index');
}