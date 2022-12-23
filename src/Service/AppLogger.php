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

    /**
     * Fun:当对象为think-log时信息转大写
     * User:Atom
     * Date:2022/12/24 12:11 AM
     * Identifier:msgToUpper
     * @param string $message 消息体
     * @return string
     */
    private function msgToUpper(string $message = ''){
        return $this->isUp ? strtoupper($message) : $message;
    }

    public function info($message = '')
    {
        $this->logger->info($this->msgToUpper($message));
    }

    public function debug($message = '')
    {
        $this->logger->debug($this->msgToUpper($message));
    }

    public function error($message = '')
    {
        $this->logger->error($this->msgToUpper($message));
    }
}