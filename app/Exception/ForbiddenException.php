<?php

namespace App\Exception;

/**
 * \App\Exception\ForbiddenException
 */
class ForbiddenException extends RhyperfException
{
    /**
     * @var int
     */
    public int  $httpCode = 403;

    /**
     * @var string
     */
    public string $msg = 'Insufficient Permissions';

    /**
     * @var string
     */
    public string $errorCode = "10004";
}