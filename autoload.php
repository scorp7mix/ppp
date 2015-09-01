<?php

function autoload($class)
{
    $path = __DIR__ . '/' . $class . '.php';
    $path = str_replace('\\', '/', $path);

    if (file_exists($path)) {
        require $path;
    } else {
        die('Call to unresolved instance: ' . $class);
    }
}

spl_autoload_register('autoload');

require_once __DIR__ . '/vendor/autoload.php';

$loader = new Twig_Loader_Filesystem(__DIR__ . '/Views');
$twig = new Twig_Environment($loader, array(
    'cache' => '/cache',
));
