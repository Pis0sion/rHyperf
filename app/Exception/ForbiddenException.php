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
    protected int  $httpCode = 403;

    /**
     * @var string
     */
    protected string $msg = 'Insufficient Permissions';

    /**
     * @var string
     */
    protected string $errorCode = "10004";
}