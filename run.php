#!/usr/bin/php
<?php

use BracketCounter\BracketCounter;

require_once './vendor/autoload.php';

try {
    set_error_handler(function ($severity, $message, $file, $line) {
        throw new ErrorException($message, $severity, $severity, $file, $line);
    });

    $input = file_get_contents($argv[1]);
} catch (Throwable $e) {
    echo "Can't read file '" . $argv[1] . "'\n";
    exit();
} finally {
    restore_error_handler();
}

try {
    echo (BracketCounter::check($input) === true ? 'true' : 'false') . "\n";
} catch (Throwable $e) {
    echo $e->getMessage() . "\n";
}
