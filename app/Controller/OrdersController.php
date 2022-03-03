<?php

namespace App\Controller;

use App\Exception\ForbiddenException;
use App\Exception\ParametersException;
use App\Exception\TokenException;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;

#[Controller]
class OrdersController
{
    #[RequestMapping(path: "/foo/exception", methods: "GET")]
    public function foo()
    {
        throw new ParametersException();
    }
}