<?php

namespace App\Controller;

use App\Annotations\Validate;
use App\Exception\ParametersException;
use App\Validate\IDValidate;
use Hyperf\Di\Annotation\AnnotationCollector;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;

#[Controller]
#[Validate(value: "1231")]
class OrdersController
{

    #[RequestMapping(path: "/foo/exception", methods: "GET")]
    #[Validate(value: IDValidate::class)]
    public function foo()
    {
        throw new ParametersException();
    }
}