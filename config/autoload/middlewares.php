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
return [
    //下面的http字符串对应config/autoload/server.php内的每个Server的name属性对应的值，
    //意味着对应的中间件配置仅应用在该 Server 中
    'http' => [
        \Hyperf\Validation\Middleware\ValidationMiddleware::class
    ],
];
