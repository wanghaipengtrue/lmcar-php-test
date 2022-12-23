<?php

namespace App\Service;
use think\LogManager;

class AppLogger
{
    const TYPE_LOG4PHP = 'log4php';
    const TYPE_THINKLOG = 'think-log';

    private $isUp = false;

    private $logger;

    public function __construct($type = self::TYPE_LOG4PHP)
    {
        if ($type == self::TYPE_LOG4PHP) {
            $this->logger = \Logger::getLogger("Log");
        }
        if ($type == self::TYPE_THINKLOG) {
            $this->logger = new LogManager();
            $this->isUp = true;
        }
    }

    public function info($message = '')
    {
        $this->logger->info($this->isUp ? strtoupper($message) : $message);
    }

    public function debug($message = '')
    {
        $this->logger->debug($this->isUp ? strtoupper($message) : $message);
    }

    public function error($message = '')
    {
        $this->logger->error($this->isUp ? strtoupper($message) : $message);
    }
}