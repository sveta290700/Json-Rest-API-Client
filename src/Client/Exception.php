<?php


namespace MyApp\Client;


class Exception
{
    private String $message;
    private int $errorCode;

    public function __construct(String $message, int $errorCode)
    {
        $this->setMessage($message);
        $this->setErrorCode($errorCode);
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
    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

    /**
     * @param int $errorCode
     */
    private function setErrorCode(int $errorCode): void
    {
        $this->errorCode = $errorCode;
    }

}