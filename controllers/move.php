<?php

require_once __DIR__ . '/../models/move.php';
require_once __DIR__ . '/../models/consignment.php';
require_once __DIR__ . '/../models/place.php';
require_once __DIR__ . '/../core/template.php';

function action_move_to_stock($db)
{
    if (isset($_POST['consignment']) && isset($_POST['stock']) && isset($_POST['quantity'])) {
        if (is_numeric($_POST['quantity']) && ($_POST['quantity'] > 0)) {
            $dbResult = moveAdd($db, [
                'id_consignment' => $_POST['consignment'],
                'id_from' => '0',
                'id_to' => $_POST['stock'],
                'quantity' => $_POST['quantity'],
            ]);
            if ($dbResult) {
                header('Location: index.php?c=report&a=main');
            } else {
                header('Location: index.php?c=move&a=to_stock');
            }
        }
    }

    $consignments = consignmentIndex($db);
    $places = placeIndex($db);

    echo render(__DIR__ . '/../views/move/to_stock.php', [
        'consignments' => $consignments,
        'places' => $places,
    ]);
}

function action_move_stock_to_workshop($db)
{
    if (isset($_POST['consignment']) && isset($_POST['stock']) && isset($_POST['workshop']) && isset($_POST['quantity'])) {
        if (is_numeric($_POST['quantity']) && ($_POST['quantity'] > 0)) {
            $dbResult = moveAdd($db, [
                'id_consignment' => $_POST['consignment'],
                'id_from' => $_POST['stock'],
                'id_to' => $_POST['workshop'],
                'quantity' => $_POST['quantity'],
            ]);
            if ($dbResult) {
                header('Location: index.php?c=report&a=main');
            } else {
                header('Location: index.php?c=move&a=stock_to_workshop');
            }
        }
    }

    $consignments = consignmentIndex($db);
    $places = placeIndex($db);

    echo render(__DIR__ . '/../views/move/stock_to_workshop.php', [
        'consignments' => $consignments,
        'places' => $places,
    ]);
}

function action_move_workshop_to_stock($db)
{
    if (isset($_POST['consignment']) && isset($_POST['stock']) && isset($_POST['workshop']) && isset($_POST['quantity'])) {
        if (is_numeric($_POST['quantity']) && ($_POST['quantity'] > 0)) {
            $dbResult = moveAdd($db, [
                'id_consignment' => $_POST['consignment'],
                'id_from' => $_POST['workshop'],
                'id_to' => $_POST['stock'],
                'quantity' => $_POST['quantity'],
            ]);
            if ($dbResult) {
                header('Location: index.php?c=report&a=main');
            } else {
                header('Location: index.php?c=move&a=workshop_to_stock');
            }
        }
    }

    $consignments = consignmentIndex($db);
    $places = placeIndex($db);

    echo render(__DIR__ . '/../views/move/workshop_to_stock.php', [
        'consignments' => $consignments,
        'places' => $places,
    ]);
}

function action_move_workshop_to($db)
{
    if (isset($_POST['consignment']) && isset($_POST['workshop']) && isset($_POST['quantity'])) {
        if (is_numeric($_POST['quantity']) && ($_POST['quantity'] > 0)) {
            $dbResult = moveAdd($db, [
                'id_consignment' => $_POST['consignment'],
                'id_from' => $_POST['workshop'],
                'id_to' => '0',
                'quantity' => $_POST['quantity'],
            ]);
            if ($dbResult) {
                header('Location: index.php?c=report&a=main');
            } else {
                header('Location: index.php?c=move&a=workshop_to');
            }
        }
    }

    $consignments = consignmentIndex($db);
    $places = placeIndex($db);

    echo render(__DIR__ . '/../views/move/workshop_to.php', [
        'consignments' => $consignments,
        'places' => $places,
    ]);
}
