<?php

namespace MyApp\Client;

class Exception
{
    private String $message;
    private int $code;

    public function __construct(String $message, int $code)
    {
        $this->setMessage($message);
        $this->setCode($code);
    }

    /**
     * @return String
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param String $message
     */
    private function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @param int $errorCode
     */
    private function setCode(int $code): void
    {
        $this->code = $code;
    }

}