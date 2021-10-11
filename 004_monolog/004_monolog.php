<?php

include __DIR__ . '/vendor/autoload.php';

function psr3User(\Psr\Log\LoggerInterface $logger) {
    $logger->error('エラー発生');
}

// \Monolog\LoggerがPSR3のLoggerInterface実装
$logger = new \Monolog\Logger(
    'log',
    // path/to/logのファイルにログを保存する指定
    [new \Monolog\Handler\StreamHandler('path/to/log')]
);

psr3User($logger);
