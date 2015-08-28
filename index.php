<?php

set_exception_handler(
    function(Exception $exception)
    {
        echo 'Exception found: ' . $exception->getMessage();
    }
);

$controller = isset($_GET['c']) ? $_GET['c'] : 'consignment';
$action = isset($_GET['a']) ? $_GET['a'] : 'index';

require_once __DIR__ . '/controllers/' . $controller . '.php';

$function = 'action_' . $controller . '_' . $action;
$function($db);