<?php

namespace App\Exception;

/**
 * \App\Exception\ParametersException
 */
class ParametersException extends RhyperfException
{
    /**
     * @var int
     */
    protected int $httpCode = 400;

    /**
     * @var string
     */
    protected string $msg = "Invalid Parameters";

    /**
     * @var string
     */
    protected string $errorCode = "100004";
}