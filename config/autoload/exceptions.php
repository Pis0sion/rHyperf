<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

use App\Exception\Handler\RhyperfExceptionHandler;

return [
    'handler' => [
        'http' => [
            \Hyperf\Validation\ValidationExceptionHandler::class,
            App\Exception\Handler\FooExceptionHandler::class,
            RhyperfExceptionHandler::class,
            App\Exception\Handler\AppExceptionHandler::class,
        ],
    ],
];
