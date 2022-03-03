<?php

namespace App\Exception\Handler;

use App\Exception\RhyperfException;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Psr\Http\Message\ResponseInterface;
use Throwable;

/**
 * \App\Exception\Handler\RhyperfExceptionHandler
 */
class RhyperfExceptionHandler extends ExceptionHandler
{

    /**
     * handle exception
     *
     * @param Throwable $throwable
     * @param ResponseInterface $response
     */
    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        $this->stopPropagation();
        // TODO: Implement handle() method.
        return $response->withHeader("content-type", "application/json")
            ->withStatus($throwable->getHttpCode())
            ->withBody(new SwooleStream(json_encode([
                "errcode" => $throwable->getErrorCode(),
                "message" => $throwable->getMsg(),
            ])));
    }

    /**
     * exception if though
     *
     * @param Throwable $throwable
     * @return bool
     */
    public function isValid(Throwable $throwable): bool
    {
        // TODO: Implement isValid() method.
        return $throwable instanceof RhyperfException;
    }
}