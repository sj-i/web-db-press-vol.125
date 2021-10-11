<?php

include __DIR__ . "/vendor/autoload.php";

// PSR-3のLoggerInterfaceを型宣言することで、
// 具体的なログ出力ライブラリへの依存を避けられる
function psr3User(\Psr\Log\LoggerInterface $logger) {
    $logger->error('エラー発生');
}

psr3User(new class implements \Psr\Log\LoggerInterface {
    use \Psr\Log\LoggerTrait;
    public function log($level, \Stringable|string $message, array $context = []): void
    {
        error_log(
            json_encode(
                [
                    'level' => $level,
                    'message' => $message,
                    'context' => $context
                ],
                JSON_UNESCAPED_UNICODE
            )
        );
    }
});
