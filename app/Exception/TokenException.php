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
    protected int $httpCode = 401;

    /**
     * @var string
     */
    protected string $msg = 'Token has expired or invalid Token';

    /**
     * @var string
     */
    protected string $errorCode = "10002";
}