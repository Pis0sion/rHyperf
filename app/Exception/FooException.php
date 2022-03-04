<?php

namespace App\Exception;

use App\Constants\ErrorCode;
use Hyperf\Server\Exception\ServerException;
use Throwable;

/**
 * 定义异常类
 */
class FooException extends ServerException
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
    protected string $errorCode = "10001";

    /**
     * @return int
     */
    public function getHttpCode(): int
    {
        return $this->httpCode;
    }

    /**
     * @return string
     */
    public function getMsg(): string
    {
        return $this->msg;
    }

    /**
     * @return string
     */
    public function getErrorCode(): string
    {
        return $this->errorCode;
    }


}