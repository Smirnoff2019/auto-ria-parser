<?php

namespace App;

use Monolog\Logger as MonoLogger;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Formatter\LineFormatter;

class Logger
{
    /**
     * @var MonoLogger
     */
    private MonoLogger $logger;

    /**
     * @param string $name
     */
    public function __construct(string $name = 'parser')
    {
        $this->logger = new MonoLogger($name);

        $logPath = __DIR__ . '/../storage/logs/parser.log';

        $handler = new RotatingFileHandler(
            $logPath,
            14, // keep 14 days
            MonoLogger::DEBUG
        );

        $format = "[%datetime%] %level_name%: %message% %context%\n";
        $formatter = new LineFormatter($format, 'Y-m-d H:i:s', true, true);
        $handler->setFormatter($formatter);

        $this->logger->pushHandler($handler);
    }

    /**
     * @param string $message
     * @param array $context
     * @return void
     */
    public function info(string $message, array $context = []): void
    {
        $this->logger->info($message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     * @return void
     */
    public function warning(string $message, array $context = []): void
    {
        $this->logger->warning($message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     * @return void
     */
    public function error(string $message, array $context = []): void
    {
        $this->logger->error($message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     * @return void
     */
    public function debug(string $message, array $context = []): void
    {
        $this->logger->debug($message, $context);
    }
}
