<?php

namespace App\Exception;

/**
 * \App\Exception\TokenException
 */
class TokenException extends RhyperfException
{

    /**
     * @var int
     */
    public int $httpCode = 401;

    /**
     * @var string
     */
    public string $msg = 'Token has expired or invalid Token';

    /**
     * @var string
     */
    public string $errorCode = "10002";
}