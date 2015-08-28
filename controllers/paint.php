<?php

require_once __DIR__ . '/../models/paint.php';
require_once __DIR__ . '/../core/template.php';

function action_paint_index($db)
{
    $paints = paintIndex($db);

    if (count($paints)) {
        echo render(__DIR__ . '/../views/paint/index.php', ['paints' => $paints]);
    } else {
        echo render(__DIR__ . '/../views/nothing_found.php');
    }
}

function action_paint_edit($db)
{
    $id = $_GET['id'];

    if (isset($_POST['name'])) {
        $dbResult = paintEdit($db, $id, ['name' => $_POST['name']]);
        if ($dbResult) {
            header('Location: index.php?c=paint&a=index');
        } else {
            header('Location: index.php?c=paint&a=edit&id=' . $id);
        }
    }

    $paint = paintShow($db, $id);

    echo render(__DIR__ . '/../views/paint/edit.php', ['paint' => $paint]);
}

function action_paint_new($db)
{
    if (isset($_POST['name'])) {

        $dbResult = paintAdd($db, ['name' => $_POST['name']]);
        if ($dbResult) {
            header('Location: index.php?c=paint&a=index');
        } else {
            header('Location: index.php?c=paint&a=new');
        }
    }

    echo render(__DIR__ . '/../views/paint/new.php');
}

function action_paint_delete($db)
{
    $id = $_GET['id'];

    paintDelete($db, $id);

    header('Location: index.php?c=paint&a=index');
}