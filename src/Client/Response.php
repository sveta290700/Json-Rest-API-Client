<?php

namespace MyApp\Client;

class Response
{
    private String $message;

    public function __construct(String $message)
    {
        $this->setMessage($message);
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

}