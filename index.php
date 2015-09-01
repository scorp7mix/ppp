<?php

use Core\Application;

require_once __DIR__ . '/autoload.php';

set_exception_handler(
    function(Exception $exception)
    {
        echo 'Exception found: ' . $exception->getMessage();
    }
);

Application::start();