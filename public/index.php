<?php

require_once __DIR__ . '/../bootstrap/autoload.php';

$uri = $_SERVER['REQUEST_URI'];

$urls = [
    '/'=> 'Controllers\Index'
];

foreach ($urls as $url => $controller) {
    if (preg_match(sprintf('/^%s$/', addcslashes($url, '/')), $uri)) {
        $controller::run();
        exit;
    }
}

Controllers\NotFound::run();
