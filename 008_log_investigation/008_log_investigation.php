<?php

use Monolog\Formatter\JsonFormatter;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

include __DIR__ . '/vendor/autoload.php';

$handler = new StreamHandler('path/to/log');
$handler->setFormatter(new JsonFormatter());
$logger = new Logger('log', [$handler]);

try {
    doSomething();
} catch (\Throwable $e) {
    $logger->error('unhandled exception',[
        'exception' => $e,
        'user_id' => getLoginUserId(),
    ]);
    throw $e;
}

class SomeException extends \Exception {}

function getLoginUserId(): ?int {
    return 1;
}

function doSomething(): void {
    if (in_array(getLoginUserId(), [1, 2], true)) {
        problemOccurs();
    }
}

function problemOccurs(): void {
    throw new SomeException();
}
