<?php

namespace Core;

use \Twig_Loader_Filesystem;
use \Twig_Environment;

class Controller
{
    protected $loader;
    protected $twig;

    public function __construct()
    {
        $this->loader = new Twig_Loader_Filesystem(__DIR__ . '/../Views');
        $this->twig = new Twig_Environment($this->loader, [
//            'cache' => __DIR__ . '/../cache',
        ]);
    }

    protected function render($file, $params = [], $custom = false)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        $class = mb_strstr(get_called_class(), '\\');
        $class = trim($class, '\\');
        $class = mb_strstr($class, 'Controller', true);

        $path = $custom ? $file . '.twig' : $class . '/' . $file . '.twig';

        echo $this->twig->render($path, $params);
    }
}