<?php

use Monolog\Formatter\JsonFormatter;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

include __DIR__ . '/vendor/autoload.php';

$handler = new StreamHandler('path/to/log');
$handler->setFormatter(new JsonFormatter());
$logger = new Logger('log', [$handler]);
$logger->info(
    'json log message',
    ['param1' => 1, 'param2' => 2]
);
