<?php

include __DIR__ . '/vendor/autoload.php';

function test(\Psr\Log\LoggerInterface $logger, $value) {
    $logger->info('ログのメッセージ', [
        'key' => $value,
        'file' => __FILE__,
        'line' => __LINE__,
    ]);
};

test(
    new class implements \Psr\Log\LoggerInterface {
        use \Psr\Log\LoggerTrait;
        public function log($level, \Stringable|string $message, array $context = []): void
        {
            var_dump($level, $message, $context);
        }
    },
    'value'
);
