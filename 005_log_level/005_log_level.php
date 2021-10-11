<?php

include __DIR__ . '/vendor/autoload.php';

function test(\Psr\Log\LoggerInterface $logger) {
    $logger->emergency('重要度最高の情報');
    $logger->alert('重要度2番目の情報');
    $logger->critical('重要度3番目の情報');
    $logger->error('重要度4番目の情報');
    $logger->warning('重要度5番目の情報');
    $logger->notice('重要度6番目の情報');
    $logger->info('重要度7番目の情報');
    $logger->debug('重要度8番目の情報');
};

test(
    new class implements \Psr\Log\LoggerInterface {
        use \Psr\Log\LoggerTrait;
        public function log($level, \Stringable|string $message, array $context = []): void
        {
            var_dump($level, $message, $context);
        }
    }
);
