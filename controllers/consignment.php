<?php

require_once __DIR__ . '/../models/consignment.php';
require_once __DIR__ . '/../models/paint.php';
require_once __DIR__ . '/../core/template.php';

function action_consignment_index($db)
{
    $consignments = consignmentIndex($db);

    if (count($consignments)) {
        echo render(__DIR__ . '/../views/consignment/index.php', ['consignments' => $consignments]);
    } else {
        echo render(__DIR__ . '/../views/nothing_found.php');
    }
}

function action_consignment_edit($db)
{
    $id = $_GET['id'];

    if (isset($_POST['name']) && isset($_POST['paint']) && isset($_POST['date'])) {
        $dbResult = consignmentEdit($db, $id, [
            'name' => $_POST['name'],
            'id_paint' => $_POST['paint'],
            'date_of_end' => date('Y-m-d', strtotime($_POST['date'])),
        ]);
        if ($dbResult) {
            header('Location: index.php?c=consignment&a=index');
        } else {
            header('Location: index.php?c=consignment&a=edit&id=' . $id);
        }
    }

    $consignment = consignmentShow($db, $id);
    $paints = paintIndex($db);

    echo render(__DIR__ . '/../views/consignment/edit.php', [
        'consignment' => $consignment,
        'paints' => $paints,
    ]);
}

function action_consignment_new($db)
{
    if (isset($_POST['name']) && isset($_POST['paint']) && isset($_POST['date'])) {
        $dbResult = consignmentAdd($db, [
            'name' => $_POST['name'],
            'id_paint' => $_POST['paint'],
            'date_of_end' => date('Y-m-d', strtotime($_POST['date'])),
        ]);
        if ($dbResult) {
            header('Location: index.php?c=consignment&a=index');
        } else {
            header('Location: index.php?c=consignment&a=new');
        }
    }

    $paints = paintIndex($db);

    echo render(__DIR__ . '/../views/consignment/new.php', ['paints' => $paints]);
}

function action_consignment_delete($db)
{
    $id = $_GET['id'];

    consignmentDelete($db, $id);

    header('Location: index.php?c=consignment&a=index');
}