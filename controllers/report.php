<?php

require_once __DIR__ . '/../models/move.php';
require_once __DIR__ . '/../core/template.php';

function action_report_main($db)
{
    $moves = moveIndex($db);

    if (count($moves)) {
        echo render(__DIR__ . '/../views/report/main.php', ['moves' => $moves]);
    } else {
        echo render(__DIR__ . '/../views/nothing_found.php');
    }
}
