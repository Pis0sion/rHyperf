<?php
declare(strict_types=1);
namespace  App\Controller;

use App\Exception\FooException;

use Hyperf\HttpServer\Annotation\AutoController;

/**
 * @AutoController()
 */
class FooController extends AbstractController
{
    // Hyperf 会自动为此方法生成一个 /foo/index 的路由，允许通过 GET 或 POST 方式请求
    public function index()
    {
        throw new FooException('Foo Exception',800);
    }
}