<?php

namespace App\Exception;


/**
 * \App\Exception\RhyperfException
 */
class RhyperfException extends \Exception
{

    /**
     * @param string $msg
     * @param int $httpCode
     * @param string $errorCode
     */
    public function __construct(
        public string $msg = "Invalid Parameters",
        public int    $httpCode = 400,
        public string $errorCode = "10001")
    {
    }


}