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
    public int $httpCode = 400;

    /**
     * @var string
     */
    public string $msg = "Invalid Parameters";

    /**
     * @var string
     */
    public string $errorCode = "100004";

}