<?php

function render($file, $params = [])
{
    foreach ($params as $key => $value) {
        $$key = $value;
    }

    ob_start();

    include __DIR__ . '/../views/layout/header.php';
    include $file;
    include __DIR__ . '/../views/layout/footer.php';

    return ob_get_clean();
}