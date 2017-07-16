<?php

require_once __DIR__ . '/autoload.php';


// Start the built-in web server in the background.
$cmd = 'php -t public -S 127.0.0.1:8000 > /dev/null 2>&1 &';
$descriptorspec = array();
$pipes = array();

$process = proc_open($cmd, $descriptorspec, $pipes);

// End the built-in web server at the end of the test.
register_shutdown_function(
    function () use ($process) {
        proc_close($process);
    }
);
